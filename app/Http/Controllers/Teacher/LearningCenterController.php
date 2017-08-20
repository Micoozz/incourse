<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\ClassTeacherCourseMap;
use App\Models\Classs;
use App\Models\Course;
use App\Models\Job;
use App\Models\Exercises;
use App\Models\Categroy;
use App\Models\Objective;
use App\Models\Subjective;
use App\Models\Compositive;
use Input;

class LearningCenterController extends Controller
{
    //学习中心controller
    const MOD_HOMEWORK = 'homework';
    const MOD_EXERCISE = 'exercise';

    const FUNC_ADD_HOMEWORK = 'addHomework';
    const FUNC_ADD_HOMEWORK_PERS = 'addHomework-personal';
    const FUNC_ADD_HOMEWORK_EXERCISE = 'exercise';

    const FUNC_ADD_EXERCISE = 'addExercise';
    const FUNC_MY_UPLOAD = 'my-upload';
    const FUNC_MY_COLLECTION = 'my-conllection';
    /**
     * 学习中心主体页面
     */
    public function learningCenter($class_id = null,$course_id = null,$mod = 'homework',$func = null){
    	$teacher = Auth::guard('employee')->user();
    	$map_list = ClassTeacherCourseMap::where('teacher_id',$teacher->id)->get();//查询出所有老师关联的数据 
    	$class_course = array();
    	foreach ($map_list as $map) {
    		if(empty($class_id)){
    			$class_id = $map->class_id;
    		}
    		if(empty($course_id)){
    			$course_id = $map->course_id;
    		}
    		$class = Classs::find($map->class_id);
    		$grade = Classs::find($class->parent_id);
    		$course = Course::find($map->course_id);
    		array_push($class_course,array('title' => $grade->title.$class->title.$course->title,'class_id' => $map->class_id,'course_id' => $map->course_id));
    	}
    	if($mod == self::MOD_HOMEWORK){
    		$class = Classs::find($class_id);
    		$grade = Classs::find($class->parent_id);
    		$course = Course::find($course_id);
    		if(empty($func) || $func == self::FUNC_ADD_HOMEWORK){
    			$title = $grade->title.$class->title.'('.$course->title.'作业)';
    		}else if($func == self::FUNC_ADD_HOMEWORK_PERS){
    			$unit_list = parent::getUnit();
    			$data = array('unit_list' => $unit_list);
    			$title = $grade->title.$class->title.'('.$course->title.'作业)';
    		}else if($func == self::FUNC_ADD_HOMEWORK_EXERCISE){
    			$data = Exercises::where('course_id',$course_id)->paginate(5);
    			foreach ($data as $exercise) {
		            $cate_title = Categroy::find($exercise->categroy_id)->title;
		            if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
		                $subjective = $exercise->hasManySubjective->first();
		                $exercise->cate_title = $cate_title;
		                $exercise->subject = $subjective->subject;
		                $exercise->answer = array('自由发挥');
		                $exercise->score = $exercise->score/100;
		            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
		            	$objective = $exercise->hasManyObjective->first();
		                $answers = array();
	                    $answer_list = explode(',',$objective->answer);
		                if($exercise->categroy_id == Exercises::CATE_CHOOSE || $exercise->categroy_id == Exercises::CATE_RADIO){
		                    foreach ($answer_list as $key => $answer) {
		                        array_push($answers,array_keys(json_decode($objective->option,true)[(int)$answer-1])[0]);
		                    }
		                }else{
		                	foreach ($answer_list as $answer) {
		                    	array_push($answers,$answer);
		                	}
		                }
		                $exercise->cate_title = $cate_title;
		                $exercise->subject = $objective->subject;
		                $exercise->options = json_decode($objective->option,TRUE);
		                $exercise->answer = $answers;
		                $exercise->score = $exercise->score/100;
		            }
		//          else{
		//              
		//          }
		        }
    		}
    	}elseif($mod == self::MOD_EXERCISE){
    		$title = '我的题库';
    		if(empty($func)){
    			$data = Exercises::where('course_id',$course_id)->paginate(10);
		        foreach ($data as $exercise) {
		            $cate_title = Categroy::find($exercise->categroy_id)->title;
		            if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
		                $subjective = $exercise->hasManySubjective->first();
		                $exercise->cate_title = $cate_title;
		                $exercise->subject = $subjective->subject;
		                $exercise->answer = array('自由发挥');
		                $exercise->score = $exercise->score/100;
		            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
		            	$objective = $exercise->hasManyObjective->first();
		                $answers = array();
		                $answer_list = explode(',',$objective->answer);
		                if($exercise->categroy_id == Exercises::CATE_CHOOSE || $exercise->categroy_id == Exercises::CATE_RADIO){
		                    foreach ($answer_list as $key => $answer) {
		                        array_push($answers,array_keys(json_decode($objective->option,true)[(int)$answer-1])[0]);
		                    }
		                }else{
		                	foreach ($answer_list as $answer) {
		                    	array_push($answers,$answer);
		                	}
		                }
		                $exercise->cate_title = $cate_title;
		                $exercise->subject = $objective->subject;
		                $exercise->options = json_decode($objective->option,TRUE);
		                $exercise->answer = $answers;
		                $exercise->score = $exercise->score/100;
		            }
		//          else{
		//              
		//          }
		        }
    		}else if($func == self::FUNC_ADD_EXERCISE){
    			$unit_list = parent::getUnit();
    			$categroy_list = parent::getCategroy();
    			$data = array('unit_list' => $unit_list,'categroy_list' => $categroy_list);
    		}else if($func == self::FUNC_MY_UPLOAD){

    		}else if($func == self::FUNC_MY_COLLECTION){

    		}
    	}
    	return view('teacher.learningCenter',compact('class_course','data','class_id','course_id','mod','func','title'));
    }
    public function uploadExercise(){
    	$input = Input::get();
    	// $code = 200;
	 	// try{
	 		foreach($input["exercise"] as $item){
	 			$this->createExercise($input["chapter"],$item);
	 		}
 	 // 	}catch(\Exception $e){
   //  		$code = 201;
	 	// }
     	// $data = array('code' => $code);
        // return json_encode($data);
    }
    public function createExercise($chapter,$item){
        $user = Auth::guard('employee')->user();
        $time = time();
        $exercise = new Exercises;
        $exercise->teacher_id = $user->id;
        $exercise->school_id = $user->school_id;
        $exercise->chapter_id = $chapter;
        // $exercise->course_id =  intval($item['course']);
        $exercise->categroy_id = intval($item['categroy']);
        $exercise->updata_time = $time;
        if($exercise->categroy_id == Exercises::CATE_RADIO ||
            $exercise->categroy_id == Exercises::CATE_CHOOSE || 
            $exercise->categroy_id == Exercises::CATE_JUDGE ||
            $exercise->categroy_id == Exercises::CATE_FILL)
        {
            $exercise->exe_type = Exercises::TYPE_OBJECTIVE;
            $exercise->score = 2 * count($item['answer']) * 100;
        }
        else if($exercise->categroy_id == Exercises::CATE_LINE || 
                $exercise->categroy_id == Exercises::CATE_SORT)
        {
            $exercise->exe_type = Exercises::TYPE_OBJECTIVE;
            $exercise->score = 1 * count($item['answer']) * 100;
        }
        else if($exercise->categroy_id == Exercises::CATE_FILLS)
        {
            $exercise->exe_type = Exercises::TYPE_SUBJECTIVE;
            $exercise->score = 2 * preg_match_all('/<span class="blank-item" contenteditable="false">空\d+</span>/',$item['subject']) * 100;
        }
        else if($exercise->categroy_id == Exercises::CATE_SHORT)
        {
            $exercise->exe_type = Exercises::TYPE_SUBJECTIVE;
            $exercise->score = 10 * 100;
        }
        else
        {
            $exercise->exe_type = Exercises::TYPE_COMPOSITIVE;
        }
        $exercise->save();
        if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
        	if($exercise->categroy_id == Exercises::CATE_SORT && empty($item['answer'])){
        		for($i = 0;$i < count($item["option"]);$i++){
        			array_push($item["answer"],$i);
        		}
        	}
        	if($exercise->categroy_id == Exercises::CATE_LINE && empty($item['answer'])){
        		for($i = 0;$i < count($item["option"]);$i++){
        			array_push($item["answer"],$i.":".$i);
        		}
        	}
			$option = array();
    		if(isset($item["option"])){
	        	foreach ($item["option"] as $key => $value) {
	        		array_push($option,array($key+1 => $value));
	        	}
    		}
        	foreach ($item["answer"] as $key => &$value) {
        		$value += 1;
        	}
        	$answer = array("answer" => $item["answer"]);
            $objective = new Objective([
                'subject' => $item['subject'],
                'option' => json_encode($option,JSON_UNESCAPED_UNICODE),
                'answer' => json_encode($answer,JSON_UNESCAPED_UNICODE)
                ]);
            $exercise->hasManyObjective()->save($objective);
        }else if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
            $subjective = new Subjective(['subject' => $item['subject']]);
            $exercise->hasManySubjective()->save($subjective);
        }else{
            $compositive = new Compositive(['content' => $item['subject']]);
            $exercise->hasOneCompositive()->save($compositive);
            $exercise->hasManySubjective()->create($item['subjective']);
            $exercise->hasManyObjective()->create($item['objective']);
        }
    }
    public function test(){
    	$arr = array("0" => "111");
    	return serialize($arr);
    }
}
