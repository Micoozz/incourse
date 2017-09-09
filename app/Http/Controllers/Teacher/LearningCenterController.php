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
use App\Models\Chapter;
use App\Models\TeacherExerciseChapterCategroyMap;
use Input;
use App\Models\Student;

class LearningCenterController extends Controller
{
    //学习中心controller
    const MOD_HOMEWORK = 'homework';
    const MOD_EXERCISE = 'my-exercise';

    const FUNC_ADD_HOMEWORK = 'addHomework';
    const FUNC_ADD_HOMEWORK_PERS = 'addHomework-personal';
    const FUNC_ADD_HOMEWORK_EXERCISE = 'exercise';

    const FUNC_ADD_EXERCISE = 'addExercise';
    const FUNC_MY_UPLOAD = 'my-upload';
    const FUNC_MY_COLLECTION = 'my-conllection';

    /**
     * 学习中心主体页面
     */
    public function learningCenter($class_id = null,$course_id = null,$mod = 'homework',$func = null,$universal = null){
    	$teacher = Auth::guard('employee')->user();
    	$map_list = ClassTeacherCourseMap::where('teacher_id',$teacher->id)->get();//查询出所有老师关联的数据 
    	$class_course = array();
    	$select_data = array();
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
    			$title = "习题库";
    			$chapter_list = Chapter::where('course_id',$course_id)->pluck("id");
    			$data = Exercises::whereIn('chapter_id',$chapter_list)->paginate(5);
    			foreach ($data as $exercise) {
		            $cate_title = Categroy::find($exercise->categroy_id)->title;
	                $exercise->cate_title = $cate_title;
	                $exercise->score = $exercise->score/100;
		            if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
		                $subjective = $exercise->hasManySubjective->first();
		                $exercise->subject = $subjective->subject;
		                $exercise->answer = array('自由发挥');
		            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
		            	$objective = $exercise->hasManyObjective->first();
		                $exercise->subject = $objective->subject;
		                $exercise->options = json_decode($objective->option,TRUE);
		                $exercise->answer = json_decode($objective->answer,TRUE)["answer"];
		            }
		//          else{
		//              
		//          }
		        }
    		}
    	}elseif($mod == self::MOD_EXERCISE){
    		$title = '我的题库';
    		if(empty($func)){
    			$chapter_list = Chapter::where('course_id',$course_id)->pluck("id");
    			$data = Exercises::where("teacher_id",$teacher->id)->whereIn('chapter_id',$chapter_list)->paginate(10);
		        foreach ($data as $exercise) {
		            $cate_title = Categroy::find($exercise->categroy_id)->title;
	                $exercise->cate_title = $cate_title;
	                $exercise->score = $exercise->score/100;
		            if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
		                $subjective = $exercise->hasManySubjective->first();
		                $exercise->subject = $subjective->subject;
		                $exercise->answer = array('自由发挥');
		            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
		            	$objective = $exercise->hasManyObjective->first();
		                $exercise->subject = $objective->subject;
		                $exercise->options = json_decode($objective->option,TRUE);
		                $exercise->answer = json_decode($objective->answer,TRUE)["answer"];
		            }
		//          else{
		//              
		//          }
		        }
		        // $select_categroy = Categroy::where("course_id","like","%{$course_id}%")->get();
		        // $exer_chapter_list = Exercises::where("teacher_id",$teacher->id)->whereIn('chapter_id',$chapter_list)->pluck("chapter_id");
		        // $parent_section = Chapter::whereIn("id",$exer_chapter_list)->pluck("parent_id");
		        // $parent_unit = Chapter::whereIn("id",$parent_section)->pluck("parent_id");
		        // $select_unit = Chapter::whereIn("id",$parent_section)->get();
		        // $select_grade = Chapter::whereIn("id",$parent_unit)->get();
		        // $select_data["select_categroy"] = $select_categroy;
		        // $select_data["select_unit"] = $select_unit;
		        // $select_data["select_grade"] = $select_grade;
		        $map = TeacherExerciseChapterCategroyMap::where("teacher_id",$teacher->id)->get()->toArray();
		        $select_data["select_categroy"] = Categroy::whereIn("id",array_column($map, "categroy_id"))->pluck("title","id");
		        $select_data["select_unit"] = Chapter::whereIn("id",array_column($map, "unit_id"))->pluck("title","id");
		        $select_data["select_grade"] = Chapter::whereIn("id",array_column($map, "grade_id"))->pluck("title","id");
		        $select_data["select_section"] = Chapter::whereIn("id",array_column($map, "section_id"))->pluck("title","id");
    		}else if($func == self::FUNC_ADD_EXERCISE){
				$unit_list = parent::getUnit();
    			$categroy_list = parent::getCategroy($course_id);
    			if(!empty($universal)){
    				$exercise = Exercises::find($universal);
    				$map = TeacherExerciseChapterCategroyMap::where("exercise_id",$exercise->id)->first();
    				$exercise->unit_id = $map->unit_id;
    				$section_list = Chapter::where("parent_id",$exercise->unit_id)->pluck("title","id");
    				$exercise->section_id = $map->section_id;
    				if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
		                $subjective = $exercise->hasManySubjective->first();
		                $exercise->subject = $subjective->subject;
		                $exercise->answer = array('自由发挥');
		            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
		            	$objective = $exercise->hasManyObjective->first();
		                $exercise->subject = $objective->subject;
		                $exercise->options = json_decode($objective->option,TRUE);
		                $exercise->answer = json_decode($objective->answer,TRUE)["answer"];
		            }
    			}
    			$data = array("unit_list" => $unit_list,"categroy_list" => $categroy_list,"section_list" => !empty($section_list) ? $section_list : null,"exercise" => !empty($exercise) ? $exercise : null);
    		}else if($func == self::FUNC_MY_UPLOAD){

    		}else if($func == self::FUNC_MY_COLLECTION){	

    		}
    	}
    	return view('teacher.learningCenter',compact("class_course","data","class_id","course_id","mod","func","title","select_data"));
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
        $exercise->teacher_id = 1;
        $exercise->school_id = $user->school_id;
        $exercise->chapter_id = $chapter["section"];
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
            $exercise->score = 1 * count($item['option'][0]) * 100;
        }
        // else if($exercise->categroy_id == Exercises::CATE_FILLS)
        // {
        //     $exercise->exe_type = Exercises::TYPE_SUBJECTIVE;
        //     $exercise->score = 2 * preg_match_all('/<span class="blank-item" contenteditable="false">空\d+</span>/',$item['subject']) * 100;
        // }
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
        $map = new TeacherExerciseChapterCategroyMap;
        $map->teacher_id = $user->id;
        $map->exercise_id = $exercise->id;
        $input_unit = Chapter::find($chapter["unit"]);
        $map->grade_id = Chapter::find($input_unit->parent_id)->id;
        $map->unit_id = $chapter["unit"];
        $map->section_id = $chapter["section"];
        $map->categroy_id = intval($item['categroy']);
        $map->save();
        if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
        	if($exercise->categroy_id == Exercises::CATE_SORT && empty($item['answer'])){
        		$item["answer"] = array();
        		for($i = 0;$i < count($item["option"]);$i++){
        			array_push($item["answer"],$i+1);
        		}
        	}
        	if($exercise->categroy_id == Exercises::CATE_LINE && empty($item['answer'])){
        		$item["answer"] = array();
        		for($i = 0;$i < count($item["option"][0]);$i++){
        			array_push($item["answer"],($i+1).":".($i+1));
        		}
        	}
			$option = array();
    		if(isset($item["option"])){
	        	if($exercise->categroy_id == Exercises::CATE_LINE){
	        		foreach($item["option"] as $i => $options){
        				$option[$i] = array();
	        			foreach($options as $key => $value){
	        				array_push($option[$i],array(($key+1) => $value));
	        			}
	        		}
	        	}else{
	        		foreach ($item["option"] as $key => $value) {
		        		array_push($option,array($key+1 => $value));
		        	}
	        	}
    		}
        	if($exercise->categroy_id == Exercises::CATE_RADIO ||
                $exercise->categroy_id == Exercises::CATE_CHOOSE){
                foreach ($item["answer"] as $key => &$value) {
                    $value += 1;
                }
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
    	$title = "添加作业";
    	return view('teacher.content.addHomework',compact("title"));
    }
}
