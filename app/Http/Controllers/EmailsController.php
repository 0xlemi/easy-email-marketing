<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Email;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::all();
        return view('emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:emails|max:255',
        //     'subject' => 'required|max:45',
        // ]);
        $email = Email::create([
            'name' => $request->name, 
            'subject' => $request->subject,
            'is_html' => 1,
        ]);

        try{
            $file_path = 'storage/files/emails/file_'.$email->id.'.html';
            $handle = fopen(public_path($file_path), 'w') or die('Cannot open file:  '.$my_file);
            $data = $request->content;
            $write_result = fwrite($handle, $data);

            $img_path = 'storage/images/emails/thumbnails/image_'.$email->id.'.jpg';
            $tn_result = \ImageHTML::loadHTML($data)->save(public_path($img_path));

            $email->path_to_email = $file_path;
            $email->path_thumbnail = $img_path;

            $result_persist = $email->save();
        }catch (Exception $e){
            $email->delete();
            flash()->error('Error', 'There was a fatal error');
            return redirect()->back();
        }
        if ($write_result && $tn_result && $result_persist){
            flash()->success('Created', 'Email created successfully.');
        }else{
            flash()->error('Not created', 'The email could not be created. Try again later.');
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
