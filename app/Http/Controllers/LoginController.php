<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;

class LoginController extends Controller
{
    //登录逻辑Controller
    
    public  function login(){
    	$input = Input::get();
        // dd($input);
    	$guard = 'web';
    	if($input['number'] == 3){
    		$guard = 'school';
    	}elseif($input['number'] == 1){
    		$guard = 'employee';
    	}elseif($input['number'] == 2){
    		$guard = 'student';
    	}
    	$code = '201';
    	if(Auth::guard($guard)->attempt(['username' => $input['name'],'password' => $input['passwords']])){
    		$code = '200';
    	}
    	$data = array('code' => $code);
    	return json_encode($data);
    }

    public function logout(){
    	Auth::logout();
    	return Redirect::to('/');
    }
}
