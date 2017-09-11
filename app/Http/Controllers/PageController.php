<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

class PageController extends Controller
{
    //页面跳转控制器
    public function index(){
        if(Auth::guard("student")->user()){
            return Redirect::to("/media");
        }
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
    public function arrangementWork(){
    	return view('teacher.arrangementWork');
    }
    public function correctingGroupWork(){
    	return view('teacher.correctingGroupWork');
    }
    public function correctingHomepage(){
    	return view('teacher.correctingHomepage');
    }
    public function correctingMainContents(){
    	return view('teacher.correctingMainContents');
    }
    public function correctingPrimarycoverage(){
    	return view('teacher.correctingPrimarycoverage');
    }
    public function correctionPrimaryCoverage(){
    	return view('teacher.correctionPrimaryCoverage');
    }
    public function exerciseEditor(){
    	return view('teacher.exerciseEditor');
    }
    public function favorites(){
    	return view('teacher.favorites');
    }
    public function groupWorkMarshalling(){
    	return view('teacher.groupWorkMarshalling');
    }
    public function groupWorkScore(){
    	return view('teacher.groupWorkScore');
    }
    public function groupWorkScoreLoooked(){
    	return view('teacher.groupWorkScoreLoooked');
    }
    public function groupWorkViewjob(){
    	return view('teacher.groupWorkViewjob');
    }
    public function homeworkCorrecting(){
    	return view('teacher.homeworkCorrecting');
    }
    public function independentOperationAddJobSection(){
    	return view('teacher.independentOperationAddJobSection');
    }
    public function independentOperationAddJobSpecificContent(){
    	return view('teacher.independentOperationAddJobSpecificContent');
    }
    public function independentOperationAddTopic(){
    	return view('teacher.independentOperationAddTopic');
    }
    public function jobAnalysis(){
    	return view('teacher.jobAnalysis');
    }
    public function singleWorkViewjob(){
    	return view('teacher.singleWorkViewjob');
    }
    public function cuotibenObjectiveTodayYuwen(){
        return view('student.cuotibenObjectiveTodayYuwen');
    }
}
