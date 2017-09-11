<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use App\Models\Student;
use App\Models\School;
use App\Models\Classs;

class LoginController extends Controller
{
    //登录逻辑Controller

    public function createSchool($pf_school_id,$school_name,$school_type){
        try{
                $school = new School;
                $school->pf_school_id = $pf_school_id;
                $school->title = $school_name;
                $school->type = $school_type;
                $school->username = rand(100000000,999999999);
                $school->save();
            }catch(\Illuminate\Database\QueryException $e){
                if($e->errorInfo[0] != 23000 || $e->errorInfo[1] != 1062){
                    throw $e;
                }
                self::createSchool();
            }
            return $school;
    }

    public  function login(){
        $input = Input::get();
        $code = '201';
        if(empty($input["sign"])){
            $guard = 'web';
            if($input['number'] == 3){
                $guard = 'school';
            }elseif($input['number'] == 1){
                $guard = 'employee';
            }elseif($input['number'] == 2){
                $guard = 'student';
            }
            if(Auth::guard($guard)->attempt(['username' => $input['name'],'password' => $input['passwords']])){
                $code = '200';
            }
        }else{
            $input["appId"] = "74";
            $user_info = parent::send_post("http://manage.jledu.com/api/getUserInfo.do",$input);
            $preg = "/\=(\{.+?\})\&/";
            preg_match_all($preg,$user_info,$user_info);
            $user_info = json_decode($user_info[1][0]);
            if($user_info->userType == 1){
                dd(11);
            }elseif($user_info->userType == 2){
                $school = School::where("pf_school_id",$user_info->schoolId)->first();
                if(empty($school)){
                    $school = self::createSchool($user_info->schoolId,$user_info->schoolName,$user_info->schoolType);
                }
                $class = Classs::where("pf_class_id",$user_info->classId)->first();
                if(empty($class)){
                    $grade = Classs::where(["school_id" => $school->id,"title" => $user_info->classYear])->first();
                    if(empty($grade)){
                        $grade = new Classs;
                        $grade->title = $user_info->classYear;
                        $grade->school_id = $school->id;
                        $grade->save();
                    }
                    $flag = strpos($user_info->className,"级");
                    if($flag){
                        $class_title = explode("级", $user_info->className);
                    }else{
                        $class_title = explode("年", $user_info->className);
                    }
                    $class = new Classs;
                    $class->parent_id = $grade->id;
                    $class->school_id = $school->id;
                    $class->title = $class_title[1];
                    $class->pf_class_id = $user_info->classId;
                    $class->save();
                }
                $user = Student::where("pf_student_id",$user_info->userID)->first();
                if(empty($user)){
                    $user = new Student;
                    $user->name = $user_info->realname;
                    $user->username = json_decode($input["json"])->userName;
                    $user->school_id = $school->id;
                    $user->class_id = $class->id;
                    $user->save();
                }
                Auth::guard("student")->login($user);
                return Redirect::to("/");
            }
        }
    	$data = array('code' => $code);
    	return json_encode($data);
    }

    public function logout(){
    	Auth::logout();
    	return Redirect::to('/');
    }
}