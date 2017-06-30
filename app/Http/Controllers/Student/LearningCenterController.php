<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Work;
use App\Models\Course;
use App\Models\Exercises;
use App\Models\Objective;
use App\Models\Categroy;
use App\Models\Subjective;
class LearningCenterController extends Controller
{	
	//页面板块
	const MOD_HOMEWORK = 1 ;

	//功能板块
	const FUNC_EXERCISE_BOOK = 1;

    public function learningCenter($course = null, $mod = 1,$work_id = null, $func = null){
        $user = Auth::guard('student')->user();
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => isset($course) ? $course : 1])->get()->toArray();
        $data = array();
        if ($mod == Self::MOD_HOMEWORK) {
        	if ($func == Self::FUNC_EXERCISE_BOOK) {        	
	        	if (!is_null($work_id)) {
	        		$work = Work::find($work_id);
	        		$exercise_id = explode(',',$work->belongsToJob()->first()->exercise_id);
				    foreach ($exercise_id as $eid) {
				        $exercise = Exercises::find($eid);
				        $cate_title = Categroy::find($exercise->categroy_id)->title;
				        if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
				            $subjective = Subjective::where('exe_id',$exercise->id)->first();
				            if (Exercises::CATE_FILLS) {
				                $countFills = preg_match_all('/&空\d+&/',$subjective['subject']);
				            }
				            array_push($data,array(
				                'id' => $exercise->id,
				                'cate_title' => $cate_title,
				                'subject' => $subjective->subject,
				                'score' => $exercise->score/100,
				                'count' => $countFills
				                ));
				        }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
				        	$objective = Objective::where('exe_id',$exercise->id)->first();
				            if($exercise->categroy_id == Exercises::CATE_LINE){
				                array_push($data,array(
				                'id' => $exercise->id,
				                'cate_title' => $cate_title,
				                'subject' => $objective->subject,
				                'options' => json_decode($objective->option,true),
				                'answer' => explode(',', $objective->answer),
				                'score' => $exercise->score/100
				                ));
				            }else{
				                if (Exercises::CATE_FILL) {
				                    $countFill = preg_match_all('/&空\d+&/',$objective['subject']);
				                }
					                array_push($data,array(
					                'id' => $exercise->id,
					                'cate_title' => $cate_title,
					                'subject' => $objective->subject,
					                'options' => json_decode($objective->option,true),
					                'score' => $exercise->score/100,
					                'count' => $countFill
					            ));
				            }
				             
				        }
				    }

	        	}
   		}else{
		    $data = Work::where(['student_id' => $user->id,'course_id' => isset($course) ? $course : 1])->paginate(5);

		    foreach ($data as $work) {
		        $work->title = $work->belongsToJob()->first()->title;
		        $work->pub_time = $work->belongsToJob()->first()->pub_time;
		        $work->deafline = $work->belongsToJob()->first()->deadline;
		    }
		}
    }elseif ($mod == 2) {
    	dd(11);
    }
    return view('student.learningCenter',compact('data','mod','func','courseAll','courseFirst','work_id'));
    }
    public function submitExercisebook(){
    	$input = Input::get();
        dd($input);
    }

    
/*    public function showWorkDetail($course,$work_id,$mod = 1){
        if(empty($work_id)){
            return;
        }
        $user = Auth::guard('student')->user();
        $work = Work::find($work_id);
        if(!$work || $work->student_id != $user->id){
            return;
        }
        if ($mod == Self::MOD_HOMEWORK) {
        $data['exercise'] = array();
        $exercise_id = explode(',',$work->belongsToJob()->first()->exercise_id);
        //dd($exercise_id);
        $data['course_all'] = Course::all();
        $data['course_first'] = Course::where(['id' => isset($course) ? $course : 1])->get()->toArray();
       
		    foreach ($exercise_id as $eid) {
		        $exercise = Exercises::find($eid);
		        $cate_title = Categroy::find($exercise->categroy_id)->title;
		        if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
		            $subjective = Subjective::where('exe_id',$exercise->id)->first();
		            if (Exercises::CATE_FILLS) {
		                $countFills = preg_match_all('/&空\d+&/',$subjective['subject']);
		            }
		            array_push($data['exercise'],array(
		                'id' => $exercise->id,
		                'cate_title' => $cate_title,
		                'subject' => $subjective->subject,
		                'score' => $exercise->score/100,
		                'count' => $countFills
		                ));
		        }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
		        	$objective = Subjective::where('exe_id',$exercise->id)->first();
		            if($exercise->categroy_id == Exercises::CATE_LINE){
		                array_push($data['exercise'],array(
		                'id' => $exercise->id,
		                'cate_title' => $cate_title,
		                'subject' => $objective->subject,
		                'options' => json_decode($objective->option,true),
		                'answer' => explode(',', $objective->answer),
		                'score' => $exercise->score/100
		                ));
		            }else{
		                if (Exercises::CATE_FILL) {
		                    $countFill = preg_match_all('/&空\d+&/',$objective['subject']);
		                }
			                array_push($data['exercise'],array(
			                'id' => $exercise->id,
			                'cate_title' => $cate_title,
			                'subject' => $objective->subject,
			                'options' => json_decode($objective->option,true),
			                'score' => $exercise->score/100,
			                'count' => $countFill
			            ));
		            }
		             
		        }
		    }
    	}
        return view('student.zuoyeben-index', compact('data','mod'));
    }*/
}
