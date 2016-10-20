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


Route::group(['middleware' => ['web']], function () {

	//

});

Route::group(['middleware' => 'web'], function () {


Route::auth();

Route::any('/home', ['as' => 'home', 'uses' => 'HomeController@index']);


	Route::group(['as' => 'user.'], function () 

		{

		Route::get('/settings', ['as' => 'settings', 'uses' => 'ProfileController@viewSettings']);
		Route::post('/settings', ['as' => 'settings', 'uses' => 'ProfileController@saveSettings']);
		Route::any('/profile/{userId}', ['as' => 'profile', 'uses' => 'ProfileController@viewProfile']);

		});

	});


//Route::get('blog','BlogController@index');


//Route::get('welcome', 'UserController@index');

//Route::get('welcome', 'HomeController@index');