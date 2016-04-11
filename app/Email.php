<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $fillable = [
		'name',
		'subject',
		'is_html',
		'path_thumbnail',
		'path_to_email',
	];
    
    public function transactions(){
		return $this->hasMany('App\Transaction');
	}
}
