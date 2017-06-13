<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Input;
use Auth;
use App\Models\Job;
use App\Models\Work;
class WorkController extends Controller
{
    //
    public function showWorkList($page = 1){
    	$limit = ($page-1)*10;
    	$job_pub = Job::where('status',Job::STATUS_PUB)->get();
    	$pageLength = intval($job_pub->count()/10)+1;
    	$job_list = Job::where('status',Job::STATUS_PUB)->skip($limit)->take(10)->get();
    	$user = Auth::guard('student')->user();
    	$data = array('total' => $job_pub->count(),'pageLength' => $pageLength,'works' => array());
    	foreach ($job_list as $job) {
    		$work = Work::where(['job_id' => $job->id,'student_id' => $user->id])->first();
    		if($work){
    			array_push($data['works'],array('work_id' => $work->id,
    				'title' => $job->title,
    				'pub_time' => $job->pub_time,
    				'deadline' => $job->deadline,
    				'start_time' => $work->start_time,
    				'sub_time' => $work->sub_time,
    				'score' => $work->score,
    				'status' => $work->status));
    		}else{
    			array_push($data['works'],array('work_id' => 0,
    				'title' => $job->title,
    				'pub_time' => $job->pub_time,
    				'deadline' => $job->deadline,
    				'start_time' => 0,
    				'sub_time' => 0,
    				'score' => 0,
    				'status' => 1));
    		}
    	}
    	return json_encode($data);
    }
}
