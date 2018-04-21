<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\NewsType;



class API extends Controller
{
    public function getNews(){
    	/*$news = NewsType::with(['News'=>function($query){
    		$query->take(10);
    	}])->get();
    	return $news->getCollection();*/
    	$news = News::paginate(10);
    	return $news->getCollection();
    }
    public function register(){
    	//return 1;
    }
}
