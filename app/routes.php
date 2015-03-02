<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/* ---------- UserC routes ---------- */
// route to show the login form
Route::get('login', array('uses' => 'UserController@showLogin'));
// route to process the form
Route::post('login', array('uses' => 'UserController@doLogin'));
// route to logout
Route::get('logout', array('uses' => 'UserController@doLogout'));

/* ---------- Public routes ---------- */
// route to show the index page
Route::get('', array('uses' => 'HomeController@index'));
Route::get('category/{id?}', array('uses' => 'HomeController@showCategory'));

	Route::get('users', array('uses' => 'UserController@listUsers'));	

/* ---------- Admin area --------------*/
Route::group(array('before' => 'auth'), function(){

	/* ---------- ItemC routes ---------- */
	Route::resource('items', 'ItemController');
	Route::get('items/destroyimg/{img_id}/{item_id}', 'ItemController@destroyImg');

	/* ---------- TypeC routes ---------- */
	Route::resource('types', 'TypeController');


});