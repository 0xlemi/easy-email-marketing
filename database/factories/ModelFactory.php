<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker){
	return[
		'name' => $faker->firstName,
		'last_name' => $faker->lastName,
		'company' => $faker->company,
		'email' => $faker->safeEmail,
	];
});

$factory->define(App\Email::class, function(Faker\Generator $faker){
	$width = rand(100, 350);
	$height = rand(150, 400);
	$img = Image::make($faker->imageUrl($width, $height, 'cats'));
	$img_path = 'storage/emails/images/'.str_random(40).'.jpg';
	$img->save('public/'.$img_path);
	return[
		'name' => $faker->word,
		'subject' => $faker->sentence( 5, true),
		'is_html' => 1,
		'path_to_email' => 'random/path',
		'path_thumbnail' => $img_path,
	];
});

$factory->define(App\Transaction::class, function(Faker\Generator $faker){
	$client_id = rand(1, 50);
	$client = App\Client::find($client_id);
	$client->add_send_counter();
	return[
		'client_id' => $client_id,
		'email_id' => rand(1, 2),
		'email_to' => $client->email,
	];
});
