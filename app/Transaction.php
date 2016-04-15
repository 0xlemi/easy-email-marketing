<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillable = [
		'email_to',
		'client_id',
		'email_id',
	];

    public function client(){
    	return $this->belongsTo('App\Client');
    }

   	public function email(){
   		return $this->belongsTo('App\Email');
   	}
}
