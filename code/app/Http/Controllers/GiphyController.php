<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class GiphyController extends Controller
{
    //

	private function api_local_cache($url){


		$cachef='cache/'.(md5($url)).'.json';
		if(Storage::disk('local')->exists($cachef)){
			$updated_at=Storage::lastModified($cachef);
			if( (time()-$updated_at) > env('GIPHY_CACHE_TTL') ){
				$data=file_get_contents($url);
				Storage::disk('local')->put($cachef, $data);
			}

		} else {
			$data=file_get_contents($url);
			Storage::disk('local')->put($cachef, $data);
		}

		$data = Storage::disk('local')->get($cachef);

		return $data; 
	}

	public function trending($page=0){
		$url = 'https://api.giphy.com/v1/gifs/trending?api_key='.env('GIPHY_API_KEY').'&limit=25&rating=G';
		$trending=$this->api_local_cache($url);
			
		return ($trending);
	}

	public function search($searchstring){

		$searchstring=urlencode($searchstring);
		$url='https://api.giphy.com/v1/gifs/search?api_key='.env('GIPHY_API_KEY').'&q='.$searchstring.'&limit=25&offset=0&rating=G&lang=en';
		$search_result=$this->api_local_cache($url);

		return ($search_result);
	}

	public function single($gif_uid){


		$url='https://api.giphy.com/v1/gifs/'.$gif_uid.'?api_key='.env('GIPHY_API_KEY');
		$single_gif=$this->api_local_cache($url);

		return $single_gif;
	}




}
