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
        $user = Auth::guard('student')->user();
        $work_all = Work::where('student_id',$user->id)->get();
        $pageLength = intval($work_all->count()/10)+1;
        $work_list = Work::where('student_id',$user->id)->skip($limit)->take(10)->get();
        $data = array('total' => $work_all->count(),'pageLength' => $pageLength,'works' => array());
        foreach ($work_list as $work) {
            array_push($data['works'],array('work_id' => $work->id,
                'title' => $work->belongsToJob()->first()->title,
                'pub_time' => $work->belongsToJob()->first()->pub_time,
                'deadline' => $work->belongsToJob()->first()->deadline,
                'start_time' => $work->start_time,
                'sub_time' => $work->sub_time,
                'score' => $work->score,
                'status' => $work->status));
        }
        return json_encode($data);
    }
    public function showWorkDetail($work_id){
        
    }
}