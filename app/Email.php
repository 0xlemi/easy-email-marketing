<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Group;
use Mail;
use App\Transaction;
class Email extends Model
{
	protected $fillable = [
		'name',
		'subject',
		'path_thumbnail',
		'path_to_email',
	];

	public function save_content($content){
		try{
            $file_path = 'storage/emails/files/file_'.$this->id.'.html';
            $write_result = file_put_contents(public_path($file_path), $content);

            $img_path = 'storage/emails/images/image_'.$this->id.'.jpg';
            // Had to change ImageWrapper.php line 117 to anable the overwrite parameter
            $tn_result = \ImageHTML::loadHTML($content)->save(public_path($img_path), true);

            $this->path_to_email = $file_path;
            $this->path_thumbnail = $img_path;

            return ($this->save() && $tn_result && $write_result);
        }catch (Exception $e){
            $this->delete();
            flash()->error('Error', 'There was a fatal error');
            return false;
        }
	}

    public function send(Client $client){

        $template_path = base_path('resources/views/templates/email_1.blade.php');

        $content = '<html>'.file_get_contents(public_path($this->path_to_email)).'</html>';
        file_put_contents($template_path, $content);

        $data = [
            'client'    => $client,
            'email'     => $this,
            'name'      => $client->name,
            'last_name' => $client->last_name,
            'company'   => $client->company,
        ];

        // Cannot use $this as lexical variable
        $that = $this;
        $result = Mail::send('templates.email_1',$data, function ($message) use ($client, $that) {
            $message->from(env('SENDER_EMAIL'), env('SENDER_NAME'));

            $message->to($client->email);
            $message->subject($that->subject);
        });
        if($result){
            Transaction::create([
                'client_id' => $client->id,
                'email_id' => $this->id,
                'email_to' => $client->email,
            ]);
        }
        return $result;
    }

    public function send_group(Group $group){
        $number_of_emails_sent = 0;
        foreach ($group->clients as $client) {
            if($this->send($client)){
                $number_of_emails_sent++;
            }
        }
        return $number_of_emails_sent;

    }
    
    public function transactions(){
		return $this->hasMany('App\Transaction');
	}

}
