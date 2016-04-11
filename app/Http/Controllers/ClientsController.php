<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ClientRequest;
use App\Http\Requests;
use App\Client;
use Carbon\Carbon;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.list');
    }

    /**
     * Temporary function, to let the datatable get the client information throught ajax
     * Array formated for datatable
     * @return array 
     */
    public function get_all(Request $request){
        if($request->ajax()){
            $clients = Client::all();
            $data = array();
            foreach($clients as $client){
                $row = [
                    $client->id,
                    $client->company,
                    $client->email,
                    $client->name.' '.$client->last_name,
                    $client->has_responded,
                    $client->is_suscribed,
                ];
                $data[] = $row;
            }
            return [ 'data' => $data];
        }
        return redirect('clients');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $data = [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'company' => $request->company,
            'is_suscribed' => ($request->is_suscribed) ? 1 : 0,
            'has_responded' => ($request->has_responded) ? 1 : 0,
        ];
        Client::create($data);
        flash()->success('Nice', 'Client created successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->name = $request->name;
        $client->last_name = $request->last_name;
        $client->email = $request->email;
        $client->is_suscribed = ($request->is_suscribed) ? 1 : 0;
        $client->has_responded = ($request->has_responded) ? 1 : 0;
        if($client->save()){
            flash()->success('Updated', 'Client successfully updated.');
        }else{
            flash()->error('Not Updated', 'Client could not be updated, try again later.');
        }
        return redirect('clients/'.$client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Client::destroy($id)){
            flash()->success("Deleted", "The client has been deleted.");
        }else{
            flash()->success("Not Deleted", "Client could not be deleted, try again later.");
        }
        return redirect('clients');

    }
}
