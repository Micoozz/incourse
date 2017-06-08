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
class ExerciseController extends Controller
{
    public function showExerciseList(){

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
