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

	Route::get('/', function () {
		return view('welcome');
	});

	// Route::get('dashboard','PagesController@dashboard');

	Route::get('register', 'RegistrationController@register');
	Route::post('register', 'RegistrationController@postRegister');
	Route::get('register/confirm/{token}', 'RegistrationController@confirmEmail');

	Route::get('login', 'SessionsController@login');
	Route::post('login', 'SessionsController@postLogin');

	Route::get('logout', 'SessionsController@logout');

	Route::get('dashboard', 'UsersController@dashboard');
	Route::get('user/profile/{user}', 'UsersController@profile');
	Route::get('user/edit/{user}', 'UsersController@edit');
	Route::post('user/update', 'UsersController@update');

	Route::get('flyers', 'FlyersController@index');

	Route::get('flyers/create', 'FlyersController@create');
	Route::post('flyers', 'FlyersController@store');

	Route::get('flyers/{id}/edit', 'FlyersController@edit');

	Route::get('flyers/{zip}/{street}', 'FlyersController@show');


	Route::post('flyers/update', 'FlyersController@update');


	Route::post('flyers/{zip}/{street}/photos', ['as'=>'store_photo_path','uses'=>'FlyersController@addPhoto']);

	Route::delete('photos/{id}','PhotosController@destroy');
