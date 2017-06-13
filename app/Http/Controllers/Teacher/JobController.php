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
    public function createJob($status = Job::STATUS_UNPUB){
    	$input = Input::get();
    	$code = 200;
    	$user = Auth::guard('employee')->user();
    	try{
    		$job = new Job;
	    	$job->teacher_id = $user->id;
	    	$job->course_id = intval($input['course']);
	    	$job->title = $input['title'];
	    	$job->job_type = intval($input['type']);
	    	$job->score = intval($input['score'])*100;
	    	$job->exercise_id = $input['exercise_id'];
	    	$job->status = $status;
	    	$job->pub_time = $status == Job::STATUS_UNPUB ? 0 : time();
	    	$job->deadline = strtotime($input['deadline']);
	    	$job->save();
    	}catch(\Exception $e){
    		$code = 201;
    	}
    	if($status == Job::STATUS_UNPUB){
    		$data = array('code' => $code);
    		return json_encode($data);
    	}else{
    		return $job;
    	}
    }
    public function pubJob(){
    	$input = Input::get();
    	$code = 200;
    	$job_id = intval($input['job_id']);
    	if(empty($job_id)){
    		$job = $this->createJob(Job::STATUS_PUB);
    	}else{
    		$job = Job::find($job_id);
    		if($job->teacher_id != Auth::guard('employee')->user()->id){
    			$code = 201;
    			$data = array('code' => $code);
				return json_encode($data);
    		}
    		$job->status = Job::STATUS_PUB;
    	}
		$job->save();
    	$data = array('code' => $code);
		return json_encode($data);
    }
}
