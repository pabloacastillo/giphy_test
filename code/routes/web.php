<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'auth'], function ($router) {
	Route::post('register', 'UserController@register');
	Route::post('login', 'UserController@login');
	Route::post('logout', 'UserController@logout');
	Route::get('me', 'UserController@me');
	Route::get('favs', 'UserController@me_favs');
	Route::get('/fav/{gifid}', 'UserController@me_favthisgif');
	Route::get('/history', 'UserController@history');
	
});


Route::get('/dosearch/{searchstring}','SearchsController@search');




Route::get('/{path}', function () {
    return view('index');
})->where('path', '(.*)');


Auth::routes();
