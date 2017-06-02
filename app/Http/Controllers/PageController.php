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
    public function media(){
    	return view('media.media');
    }
    public function addEmployeeFile(){
    	return view('admin.addEmployeeFile');
    }
    public function addStudentFile(){
    	return view('admin.addStudentFile');
    }
    public function employeeFile(){
    	return view('admin.employeeFile');
    }
    public function studentFile(){
    	return view('admin.studentFile');
    }
    public function teacherPersonData(){
    	return view('admin.teacherPersonData');
    }
    public function bonusList(){
    	return view('admin.BonusList');
    }
    public function exerciseManagement(){
    	return view('admin.ExerciseManagement');
    }
    public function sRewardEditor(){
    	return view('admin.SRewardEditor');
    }
    public function studentAchievement(){
    	return view('admin.StudentAchievement');
    }
    public function studentManagement(){
    	return view('admin.StudentManagement');
    }
    public function teacherTask(){
    	return view('admin.TeacherTask');
    }
    public function teachingManagement(){
    	return view('admin.TeachingManagement');
    }
    public function tRewardEditor(){
    	return view('admin.TRewardEditor');
    }
    public function uploadExercises(){
    	return view('admin.UploadExercises');
    }
}
