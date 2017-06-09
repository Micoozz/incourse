<?php 

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Input;
use Auth;
use Models\Exercises;
use Models\Objective;
use Models\Subjective;
use Models\Compositive;
use Models\Categroy;
class ExerciseController extends Controller
{
    public function showExerciseList($page){
    	$limit = ($page-1)*5;
    	$exercise_all = Exercises::all();
    	$exercise_list = $exercise_all->limit($limit,5);
    	$data = array();
    	foreach ($exercise_list as $exercise) {
    		$cate_title = Categroy::find($exercise->categroy_id)->title;
    		if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
    			$subjective = Subjective::where('exe_id',$exercise->id)->first();
    			array_push($data['exercises'],array('id' => $exercise->id,'cate_title' => $cate_title,'subject' => $subjective->subject,'answer' => '自由发挥'));
    		}else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
    			$objective = Objective::where('exe_id',$exercise->id)->first();
				$answers = array();
    			if($exercise->categroy_id == Exercises::CATE_CHOOSE || $exercise->categroy_id == Exercises::CATE_RADIO){
    				$answer_list = json_decode($objective->answer);
    				foreach ($answer_list as $answer) {
    					array_push($answers,json_decode($objective->option)[$answer]->key);
    				}
    			}else{
    				$answers = json_decode($objective->answer);
    			}
    			array_push($data['exercises'],array('id' => $exercise->id,'cate_title' => $cate_title,'subject' => $objective->subject,'answer' => $answers));
    		}
    	}
    }
    public function createExercise(){
    	$input = Input::get();
    	$user = Auth::guard('employee')->user();
    	$time = time();
    	$code = 200;
    	try{
    		$exercise = new Exercises;
	    	$exercise->teacher_id = $user->id;
	    	$exercise->school_id = $user->school_id;
	    	$exercise->course_id =  intval($input['course']);
	    	$exercise->score = intval($input['score'])*100;
	    	$exercise->categroy_id = intval($input['categroy']);
	    	$exercise->updata_time = $time;
	    	if($exercise->categroy_id == Exercises::CATE_RADIO ||
	    		$exercise->categroy_id == Exercises::CATE_CHOOSE || 
	    		$exercise->categroy_id == Exercises::CATE_LINE || 
	    		$exercise->categroy_id == Exercises::CATE_SORT || 
	    		$exercise->categroy_id == Exercises::CATE_JUDGE ||
	    		$exercise->categroy_id == Exercises::CATE_FILL)
	    	{
	    		$exercise->exe_type = Exercises::TYPE_OBJECTIVE;
	    	}
	    	else if($exercise->categroy_id == Exercises::CATE_COMPOSITIVE)
	    	{
	    		$exercise->exe_type = Exercises::TYPE_COMPOSITIVE;
	    	}
	    	else
	    	{
	    		$exercise->exe_type = Exercises::TYPE_SUBJECTIVE;
	    	}
	    	$exercise->save();
	    	if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
	    		$objective = new Objective(['subject' => $input['subject'],'option' => $input['option'],'answer' => $input['answer']]);
	    		$exercise->hasManyObjective()->save($objective);
	    	}else if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
	    		$subjective = new Subjective(['subject' => $input['subject']]);
	    		$exercise->hasManySubjective()->save($subjective);
	    	}else{
	    		$compositive = new Compositive(['content' => $input['subject']]);
	    		$exercise->hasOneCompositive()->save($compositive);
	    		$exercise->hasManySubjective()->create($input['subjective']);
	    		$exercise->hasManyObjective()->create($input['objective']);
	    	}
    	}catch(\Exception $e){
    		$code = 201;
    	}
    	$data = array('code' => $code);
    	return json_encode($data);
    }
}
