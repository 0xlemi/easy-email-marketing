<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
    	'name',
    ];

    public function clients(){
    	return $this->hasMany('App\Client');
    }
    public function number_of_clients(){
    	return $this->clients()->count();
    }
}
