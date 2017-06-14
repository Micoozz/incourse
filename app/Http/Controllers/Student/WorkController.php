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
            array_push($data['works'],array(
                'work_id' => $work->id,
                'title' => $work->belongsToJob()->first()->title,
                'pub_time' => $work->belongsToJob()->first()->pub_time,
                'deadline' => $work->belongsToJob()->first()->deadline,
                'type' => $work->belongsToJob()->first()->job_type,
                'start_time' => $work->start_time,
                'sub_time' => $work->sub_time,
                'score' => $work->score/100,
                'status' => $work->status == Work::STATUS_OPEN ? '开放' : $work->status == Work::STATUS_UNSUB ? '未提交' : '关闭'
                ));
        }
        return json_encode($data);
    }
    public function showWorkDetail($work_id,$page = 1){
        if(empty($work_id)){
            return '1';
        }
        $limit = ($page-1)*5;
        $user = Auth::guard('student')->user();
        $work = Work::find($work_id);
        if(!$work || $work->student_id != $user->id){
            return '2';
        }
        $exercise_id_arr = explode(',',$work->belongsToJob()->first()->exercise_id);
        $exercise_id = array_slice($exercise_id_arr,$limit,5);
        $pageLength = intval(count($exercise_id_arr)/5)+1;
        $data = array('total' => count($exercise_id_arr),'pageLength' => $pageLength,'exercises' => array());
        foreach ($exercise_id as $eid) {
            $exercise = Exercises::find($eid);
            $cate_title = Categroy::find($exercise->categroy_id)->title;
            if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
                $subjective = Subjective::where('exe_id',$exercise->id)->first();
                array_push($data['exercises'],array(
                    'id' => $exercise->id,
                    'cate_title' => $cate_title,
                    'subject' => $subjective->subject,
                    'answer' => '自由发挥',
                    'score' => $exercise->score/100
                    ));
            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $objective = Objective::where('exe_id',$exercise->id)->first();
                $answers = array();
                if($exercise->categroy_id == Exercises::CATE_CHOOSE || $exercise->categroy_id == Exercises::CATE_RADIO){
                    $answer_list = explode(',',$objective->answer);
                    foreach ($answer_list as $key => $answer) {
                        array_push($answers,array_keys(json_decode($objective->option,true)[(int)$answer-1])[0]);
                    }
                }else{
                    array_push($answers,explode(',',$objective->answer));
                }
                array_push($data['exercises'],array(
                    'id' => $exercise->id,
                    'cate_title' => $cate_title,
                    'subject' => $objective->subject,
                    'options' => json_decode($objective->option),
                    'answer' => $answers,
                    'score' => $exercise->score/100
                    ));
                
            }
        }
        return json_encode($data);
    }
    public function subWork(){
        
    }
}