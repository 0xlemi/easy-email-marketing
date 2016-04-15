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

Route::resource('groups', 'GroupsController');

Route::resource('clients', 'ClientsController');

Route::resource('emails', 'EmailsController');
Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/send/{id}', 'SendController@choose_client');
Route::get('/send/group/{id}', 'SendController@choose_group');
Route::get('/send/review/{id_email}/{id_client}', 'SendController@review');
Route::get('/send/group/review/{id_email}/{id_client}', 'SendController@review_group');
Route::get('/send/{id_email}/{id_client}', 'SendController@send');
Route::get('/send/group/{id_email}/{id_client}', 'SendController@send_to_group');
