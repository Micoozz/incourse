<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Input;
use Auth;
use App\Models\Job;
class JobController extends Controller
{
    //
    public function createJob(){
    	$input = Input::get();
    	$user = Auth::guard('employee')->user();
    	$job = new Job;
    	$job->teacher_id = $user->id;
    	$job->course_id = intval($input['course']);
    	$job->job_type = intval($input['type']);
    	$job->score = intval($input['score'])*100;
    	$job->exercise_id = json_encode($input['exercise_id']);
    	$job->status = Job::STATUS_UNPUB;
    	$job->pub_time = 0;
    	$job->deadline = intval($input['deadline']);
    	$job->save();
    }
    public function pubJob(){
    	
    }
}
