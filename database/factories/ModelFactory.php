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
			'firstname' => $faker->firstName,
			'lastname'  => $faker->lastName,
			'username'  => $faker->userName,

			'address1'       => $faker->streetAddress,
			'city'           => $faker->city,
			'zip'            => $faker->postcode,
			'state'          => $faker->state,
			'country'        => 'US',
			'verified'       => 1,
			'email'          => $faker->safeEmail,
			'password'       => bcrypt(str_random(10)),
			'verified'       => true,
			'remember_token' => str_random(10),
		];
	});


	$factory->define(App\Flyer::class, function (Faker\Generator $faker) {
		return [
			'street'      => $faker->streetAddress,
			'city'        => $faker->city,
			'zip'         => $faker->postcode,
			'state'       => $faker->state,
			'country'     => 'US',
			'price'       => $faker->numberBetween(10000, 500000),
			'description' => $faker->paragraphs(5, 3),
			'user_id'     => factory('App\User')->create()->id
		];
	});

	$factory->define(App\Photo::class, function (Faker\Generator $faker) {
		return [

			'flyer_id'       => factory('App\Flyer')->create()->id,
			'name'           => $faker->sentence,
			'thumbnail_path' => $faker->imageUrl(200, 200),
			'photo_path'     => $faker->imageUrl(800, 800),
			'caption'        => $faker->sentence

		];
	});
