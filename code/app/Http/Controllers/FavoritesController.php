<?php

namespace App\Http\Controllers;

use App\Favorites;
use Illuminate\Http\Request;

use \App\User;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{

    // SETS AND REMOVE FAVORITES FOR CURRENT USER
    public function fav4me($gifid){
        $current_user=Auth::user();
        if(!$current_user){
            return false;
        }

        $is_favorite=Favorites::where('gif_uid', $gifid)->where('user_id',$current_user->id)->get();

        if($is_favorite->isEmpty()){
            
            $fav = new Favorites();
            $fav->gif_uid = $gifid;
            $fav->user_id = $current_user->id;
            $fav->save();

            return 'true';
        } else {
            Favorites::where('gif_uid', $gifid)->where('user_id',$current_user->id)->delete();
            return 'false';
        }

        return 'error';

    }

    // RETURNS ALL FAVORITES SELECT BY CURRENT USER
    public function my_favs(){
        $current_user=Auth::user();
        if(!$current_user){ return false; }

        $favorites=Favorites::where('user_id',$current_user->id)->orderBy('id', 'desc')->get();

        $return=[];
        foreach ($favorites as $key => $value) {
            $data = json_decode(app('App\Http\Controllers\GiphyController')->single($value->gif_uid));
            $return[]=($data->data);
        }

        return $return;

    }

}
