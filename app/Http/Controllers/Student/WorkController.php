<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Input;
use Auth;
use App\Models\Job;
class WorkController extends Controller
{
    //
    public function showWorkList($page = 1){
    	$limit = ($page-1)*10;
    	$job_pub = Job::where('status',Job::STATUS_PUB)->get();
    	$pageLength = intval($job_pub->count()/10)+1;
    	$job_list = Job::where('status',Job::STATUS_PUB)->skip($limit)->take(10)->get();
    	$data = array('total' => $job_pub->count(),'pageLength' => $pageLength,'jobs' => array());
    	foreach ($job_list as $job) {

    	}
    }
}
