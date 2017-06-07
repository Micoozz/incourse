<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Models\Course;
use Models\Categroy;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getCourse(){
    	$course_list = Course::all();
    	return json_encode($course_list);
    }
    public function getCategroy(){
    	$categroy_list = Categroy::all();
    	return json_encode($categroy_list);
    }
}
