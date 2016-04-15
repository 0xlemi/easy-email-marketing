<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Email;

class EmailsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $this->validate($request, [
            'name' => 'required|unique:emails|max:255',
            'subject' => 'required|max:45',
        ]);
        $email = Email::create([
            'name' => $request->name, 
            'subject' => $request->subject
        ]);

        $result = $email->save_content($request->content);
        if ($result){
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
        $email = Email::findOrFail($id);
        return view('emails.show', compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = Email::findOrFail($id);
        $file_path = $email->path_to_email;
        $handle = fopen($file_path, 'r');
        $content = fread($handle,filesize($file_path)); 
        return view('emails.edit', compact('email', 'content'));
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
        $this->validate($request, [
            'name' => 'required|unique:emails|max:255',
            'subject' => 'required|max:45',
        ]);
        $email = Email::findOrFail($id);
        $email->name = $request->name;
        $email->subject = $request->subject;

        $result = $email->save_content($request->content);
        if ($result){
            flash()->success('Updated', 'Email was updated successfully.');
        }else{
            flash()->error('Not updated', 'The email could not be updated. Try again later.');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Email::destroy($id)){
            flash()->success("Deleted", "The email has been deleted.");
        }else{
            flash()->success("Not Deleted", "Email could not be deleted, try again later.");
        }
        return redirect('emails');
    }
}
