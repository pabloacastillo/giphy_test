<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User;
// use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    //
    public function register(Request $request){

    	$input=$request->all();


		$user = new \App\User();
		$user->password = Hash::make($input['password']);
		$user->email = $input['email'];
		$user->name = $input['name'];
		$guardar=$user->save();

		if($guardar){
			return 'true';
		}
    	return 'false';	
    }


    public function login(Request $request){

    	$input=$request->all();
    	// return json_encode($input);

    	if(Auth::attempt(['email' => $input['email'], 'password' => $input['password']])){
			$user = \App\User::where('email', $input['email'])->first();
			Auth::login($user);
			return 'true';
    	}

    	return 'false';	
    }


    public function logout(Request $request){

    	return $request->all();	
    }


    public function me(){
    	return json_encode(Auth::user());	
    }

    public function me_favthisgif($gifid){
        $data = app('App\Http\Controllers\FavoritesController')->fav4me($gifid);
        return ($data);
    }

    public function me_favs(){
        $data = app('App\Http\Controllers\FavoritesController')->my_favs();
        return ($data);
    }


    public function history(){
        $data = app('App\Http\Controllers\SearchsController')->my_searchs();
        return ($data);
    }
}
