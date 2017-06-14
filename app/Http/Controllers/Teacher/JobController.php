<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Input;
use Auth;
use App\Models\Job;
use App\Models\Work;
class JobController extends Controller
{

    public function showJoblist($page = 1)
    {
        $job_all = Job::where('teacher_id',Auth::guard('employee')->user()->id)->get();
        $limit = ($page-1)*10;
        $pageLength = intval($job_all->count()/10)+1;
        $job_list = Job::skip($limit)->take(10)->get();
        $data = array('total' => $job_all->count(),'pageLength' => $pageLength,'jobs' => array());
        foreach ($job_list as $job){
          $job_type = $job->job_type == Job::TYPE_JOB?'小组':'个人';
          $job_status = $job->job_status == Job::STATUS_JOB?'已发布':'未发布';
          array_push($data['jobs'],array('id' => $job->id,'title' => $job->title,
            'job_type' => $job_type,'pub_time' => $job->pub_time,
            'job_status' => $job->status,'deadline' => $job->deadline));
        }
        return json_encode($data);
    }
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
	    	$job->exercise_id = json_encode($input['exercise_id']); 
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
       if($job->teacher_id == Auth::guard('employee')->user()->id){
            $work = new Work;
            $work->student_id = 1；
            $word->job_id = $job->id;
            $word->course = $job->course_id;
            $word->status = 1;
            $work->start_time = 0;
            $word->sub_time = 0;
            $word->save();
        }
		$job->save();
    	$data = array('code' => $code);
		return json_encode($data);
    }
}
