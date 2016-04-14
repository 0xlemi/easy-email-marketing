<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $fillable = [
		'name',
		'last_name',
		'company',
		'email',
		'is_suscribed',
		'has_responded',
	];

	/*
	 * Increment the sent email counter
	 */ 
	public function add_send_counter(){
		$times_sent = $this->times_sent + 1;
		$this->update(['times_sent' => $times_sent]);
	}

	/*
	 * Client can have many transactions
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */ 
	public function transactions(){
		return $this->hasMany('App\Transaction');
	}

	public function group(){
   		return $this->belongsTo('App\Group');
   	}

}
