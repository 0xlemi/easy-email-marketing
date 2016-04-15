<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use JavaScript;
use App\Email;
use App\Client;
use App\Group;
use Mail;
class SendController extends Controller
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

    public function choose_client($id){
    	$email = Email::findOrFail($id);
    	$clients = Client::all();
    	JavaScript::put([
            'url' => url('send/review/'.$email->id).'/',
        ]);
    	return view('send.clients', compact('email', 'clients'));
    }

    public function choose_group($id){
        $email = Email::findOrFail($id);
        $groups = Group::all();
        JavaScript::put([
            'url' => url('send/group/review/'.$email->id).'/',
        ]);
        return view('send.group', compact('email','groups'));
    }

    public function review($id_email, $id_client){
    	$email = Email::findOrFail($id_email);
    	$client = Client::findOrFail($id_client);
    	return view('send.review',compact('email','client'));
    }

    public function review_group($id_email, $id_group){
        $email = Email::findOrFail($id_email);
        $group = Group::findOrFail($id_group);
        return view('send.group.review',compact('email','group'));
    }

    public function send($id_email, $id_client){
    	$email = Email::findOrFail($id_email);
    	$client = Client::findOrFail($id_client);

		if($email->send($client)){
			flash()->success('Email sent', 'The email was sent to '.$client->email.' successfully.');
			return redirect('emails/'.$email->id);
		}else{
			flash()->error('Not sent', 'Unable to send email to '.$client->email);
			return redirect()->back();
		}
    }

    public function send_to_group($id_email, $id_group){
        $email = Email::findOrFail($id_email);
        $group = Group::findOrFail($id_group);

        $num_of_emails = $group->clients->count();
        $num_of_emails_sent = $email->send_group($group);

        if($num_of_emails == $num_of_emails_sent){
            flash()->success('All emails sent', 'There were '.$num_of_emails_sent.' emails successfully sent.');
            return redirect('emails/'.$email->id);
        }
        flash()->overlay('Some emails where not sent', 
                'Unable to send '.$num_of_emails-$num_of_emails_sent.' out of '.$num_of_emails.'emails.', 'error');
        return redirect()->back();

    }

}
