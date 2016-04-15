<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;
use JavaScript;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        JavaScript::put([
            'url' => url('groups').'/',
        ]);
        $groups = Group::all();
        return view('groups.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required|unique:groups|max:70',
        ]);

        $result = Group::create($request->all());

        if($result){
            flash()->success('Created', 'Group has been successfully created.');
            return redirect('/groups');
        }else{
            flash()->error('Not created', 'The group was not created, please try again later.');
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::findOrFail($id);
        JavaScript::put([
            'url' => url('clients').'/',
        ]);
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
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
        $validator = $this->validate($request, [
            'name' => 'required|unique:groups|max:70',
        ]);

        $group = Group::findOrFail($id);
        $group->name = $request->name;
        if($group->save()){
            flash()->success('Updated', 'Group has been successfully updated.');
            return redirect('groups/'.$group->id);
        }else{
            flash()->error('Not updated', 'The group was not updated, please try again later.');
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Group::destroy($id)){
            flash()->success('Deleted', 'Group has been successfully deleted.');
            return redirect('groups');
        }
        flash()->error('Not deleted', 'Group was not deleted, try again later.');
        return redirect()->back();
    }
}
