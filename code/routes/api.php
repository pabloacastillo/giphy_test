<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
	dd(Auth::user()) ;
    return $request->user();
});


Route::get('search/{searchstring}','GiphyController@search');

Route::get('trending','SearchsController@trending');

Route::get('gif/{gif_uid}','GiphyController@single');


Route::get('/test',function(){
	return App\User::all();
});