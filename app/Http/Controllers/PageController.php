<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PageController extends Controller
{
    //页面跳转控制器
    public function index(){
    	return view('index');
    }
    public function media(Request $request){
    	return view('media.media');
    }
}
