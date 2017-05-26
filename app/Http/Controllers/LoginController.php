<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //登录逻辑Controller
    
    public  function login(){
    	$input = Input::get();
    	if($input->login_entry == 1){

    	}elseif($input->login_entry == 2){

    	}elseif($input->login_entry == 3){

    	}
    	if(Auth::guard($guard)->attempt(['username' => $input->username,'password' => $password])){

    	}
    }
}
