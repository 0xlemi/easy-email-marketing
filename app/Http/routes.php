<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('clients/getAll', 'ClientsController@get_all');
Route::resource('clients', 'ClientsController');

Route::resource('emails', 'EmailsController');
Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
