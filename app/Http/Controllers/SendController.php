<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use JavaScript;
use App\Email;
use App\Client;
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
            'getAll_path' => url('clients/getAll'),
            'url' => url('send/review/'.$email->id).'/',
        ]);
    	return view('send.clients');
    }

    public function review($id_email, $id_client){
    	$email = Email::findOrFail($id_email);
    	$client = Client::findOrFail($id_client);
    	return view('send.review',compact('email','client'));
    }

    public function send($id_email, $id_client){
    	$email = Email::findOrFail($id_email);
    	$client = Client::findOrFail($id_client);

		$template_path = base_path('resources/views/templates/email_1.blade.php');

		$content = '<html>'.file_get_contents(public_path($email->path_to_email)).'</html>';
		file_put_contents($template_path, $content);

		$data = [
			'client' 	=> $client,
			'email' 	=> $email,
			'name' 		=> $client->name,
			'last_name' => $client->last_name,
			'company' 	=> $client->company,
		];
		$result = Mail::send('templates.email_1',$data, function ($message) use ($client, $email) {
		    $message->from('us@market.poolreportsystem.com', 'Laravel');

		    $message->to($client->email);
		    $message->subject($email->subject);
		});

		if($result){
			flash()->success('Email sent', 'The email was sent to '.$client->email.' successfully.');
			return redirect('emails/'.$email->id);
		}else{
			flash()->error('Not sent', 'Unable to send email to '.$client->email);
			return redirect()->back();
		}
    }

}
