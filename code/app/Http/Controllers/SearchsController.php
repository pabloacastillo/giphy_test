<?php

namespace App\Http\Controllers;

use App\Searchs;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class SearchsController extends Controller
{


    public function trending(){
        $data = app('App\Http\Controllers\GiphyController')->trending();
        return $data;
        return view('list',compact('data'));
    }


    public function search($searchstring){
        $data = app('App\Http\Controllers\GiphyController')->search($searchstring);

        $current_user=Auth::user();
        if($current_user){
            $_search = new Searchs();
            $_search->search = $searchstring;
            $_search->user_id = $current_user->id;
            $_search->save();
        }

        return $data;

    }


    public function my_searchs(){
        $current_user=Auth::user();
        if(!$current_user){
            return false;
        }

        $my_searchs=Searchs::where('user_id',$current_user->id)->orderBy('id', 'desc')->get();
        // $my_searchs=Searchs::all();
        return $my_searchs;
    }

    
}
