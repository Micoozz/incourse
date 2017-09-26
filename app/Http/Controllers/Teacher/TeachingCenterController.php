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

class TeachingCenterController extends TeacherController
{
    //学习中心controller
    const MOD_HOMEWORK = 'homework';
    const MOD_EXERCISE = 'my-exercise';

    const FUNC_ADD_HOMEWORK = 'addHomework';
    const FUNC_ADD_HOMEWORK_PERS = 'addHomework-personal';
    const FUNC_ADD_HOMEWORK_EXERCISE = 'exercise';

    const FUNC_ADD_EXERCISE = 'addExercise';

    const ACT_MY_UPLOAD = 'my-upload';
    const ACT_MY_COLLECTION = 'my-conllection';

    protected $class_id;
    protected $course_id;

    public function __construct(){
        
    }

    /**
     * 学习中心主体页面
     */
    private function getClassCourse($teacher_id){
        $map_list = ClassTeacherCourseMap::where('teacher_id',$teacher_id)->get();//查询出所有老师关联的数据 
        $class_course = array();
        foreach ($map_list as $map) {
            $class = Classs::find($map->class_id);
            $grade = Classs::find($class->parent_id);
            $course = Course::find($map->course_id);
            array_push($class_course,array('title' => $grade->title."届".$class->title.$course->title,'class_id' => $map->class_id,'course_id' => $map->course_id));
        }
        return $class_course;
    }
    public function bindClass($grade_id){
        $title = "绑定班级";
        $class_list = Classs::where('parent_id',$grade_id)->pluck('title','id');
        $course_list = Course::pluck('title','id');
        return view('teacher.pf-login-teacher',compact('title','grade_id','class_list','course_list'));
    }
    public function teachingCenter($class_id = null,$course_id = null){
        $port = "teachingCenter";
        return $this->addHomework($class_id,$course_id,$port);
    }
    public function homeworkManage($class_id = null,$course_id = null){
        $port = "homeworkManage";
        return $this->addHomework($class_id,$course_id,$port);
    }
    public function addHomework($class_id = null,$course_id = null,$port = null){
        $title = "添加作业";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id); 
        $map = ClassTeacherCourseMap::where('teacher_id',$teacher->id)->first();
        if(empty($class_id)){
            $class_id = $map->class_id;
        }
        if(empty($course_id)){
            $course_id = $map->course_id;
        }
        if(empty($port)){
            $port = "addHomework";
        }
        return view('teacher.content.addHomework',compact("title",'class_course','class_id','course_id','port'));
    }
    public function addHomeworkPer($class_id,$course_id){
        $title = "添加作业";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        $port = "addHomework-personal";
        $unit_list = parent::getUnit();
        return view('teacher.content.addHomework-personal',compact("title",'class_course','class_id','course_id','unit_list','port'));
    }
    public function correct($class_id,$course_id,$type = Job::TYPE_PERSONAL,$unit_id = null,$section_id = null){
        $title = "批改作业";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        $port = "correct";
        $job_list = Job::where(['teacher_id' => $teacher->id,'job_type' => $type,'class_id' => $class_id])->where(function($query) use($unit_id,$section_id,$course_id){
            if(!empty($section_id)){
                $query->where('chapter_id',$section_id);
            }elseif(!empty($unit_id)){
                $section_id_list = Chapter::where('parent_id',$unit_id)->pluck('id');
                $query->whereIn('chapter_id',$section_id_list);
            }else{
                $section_id_list = Chapter::where('course_id',$course_id)->pluck('id');
                $query->whereIn('chapter_id',$section_id_list);
            }
        })->paginate(10);
        $job_section_list = Job::where(['teacher_id' => $teacher->id,'job_type' => $type,'class_id' => $class_id])->pluck('chapter_id');
        $section_id_list = Chapter::whereIn('id',$job_section_list)->pluck('parent_id');
        $unit_list = Chapter::whereIn('id',$section_id_list)->where('course_id',$course_id)->pluck('title','id');
        $section_list = Chapter::where('parent_id',$unit_id)->whereIn('id',$job_section_list)->pluck('title','id');
        return view('teacher.content.correct',compact("title",'class_course','class_id','course_id','port','job_list','unit_list','section_list','type','unit_id','section_id'));
    }
    public function uploadExercise($class_id,$course_id,$exe_id = null){
        $title = "上传习题";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        $port = "uploadExercise";
        $unit_list = parent::getUnit();
        $categroy_list = parent::getCategroy($course_id);
        return view('teacher.content.uploadExercise',compact("title",'class_course','class_id','course_id','unit_list','categroy_list','port','exe_id'));
    }
    public function getEditExecrise($exe_id){
        $exercise = Exercises::find($exe_id);
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
        return json_encode($exercise,JSON_UNESCAPED_UNICODE);
    }

    public function exercise($class_id,$course_id,$action = null){
        $title = "习题库";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        $port = "exercise";        
        $chapter_list = Chapter::where('course_id',$course_id)->pluck("id");
        if(empty($action)){
            $data = Exercises::whereIn('chapter_id',$chapter_list)->paginate(10);
        }elseif($action == self::ACT_MY_UPLOAD){
            $data = Exercises::where('teacher_id',$teacher->id)->whereIn('chapter_id',$chapter_list)->paginate(10);
        }
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
        return view('teacher.content.exercise',compact("title",'class_course','class_id','course_id','port','data','action'));
    }
    public function learningCenterfix($class_id = null,$course_id = null,$mod = 'homework',$func = null,$universal = null){
        $teacher = Auth::guard("employee")->user();
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
    	$select_data = array();
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

    public function teacherBindClass(){
        $input = Input::get();
        $teacher = Auth::guard('employee')->user();
        $grade = Classs::find($input["grade_id"]);
        if(empty($grade) || $grade->school_id != $teacher->school_id){
            return json_encode(["code" => 202]);
        }
        $class = Classs::where(['parent_id' => $grade->id,'title' => $input['create-class']."班"])->orWhere('id',$input['select-class'])->first();
        if(empty($class)){
            $class = new Classs;
            $class->school_id = $teacher->school_id;
            $class->parent_id = $grade->id;
            $class->title = $input['create-class']."班";
            $class->save();
        }
        $map = ClassTeacherCourseMap::where(['class_id' => $class->id,'teacher_id' => $teacher->id,'course_id' => $input['select-course']])->first();
        if(!empty($map)){
            return json_encode(["code" => 201]);
        }
        $map = new ClassTeacherCourseMap;
        $map->class_id = $class->id;
        $map->teacher_id = $teacher->id;
        $map->course_id = $input['select-course'];
        $map->save();
        return json_encode(["code" => 200]);
    }

    //习题功能
    /*上传习题*/
    public function addExercise(){
    	$input = Input::get();
    	$code = 200;
        $exercise_id_list = array();
        try{
            if(empty($input["exercise"][0]["exe_id"])){
                foreach($input["exercise"] as $item){
                    array_push($exercise_id_list,$this->createExercise($input["chapter"],$item));
                }
            }else{
                array_push($exercise_id_list,$this->editExecrise($input["exercise"][0]["exe_id"],$input["chapter"],$input["exercise"][0]));
            }
        }catch(\Exception $e){
            $code = 201;
        }
     	$data = array('code' => $code,'id_list' => $exercise_id_list);
        return json_encode($data);
    }

    /*新建习题*/
    private function createExercise($chapter,$item){
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
        return $exercise->id;
    }

    /*编辑习题*/
    private function editExecrise($exe_id,$chapter,$item){
        $exercise = Exercises::find($exe_id);
        $exercise->chapter_id = $chapter["section"];
        $exercise->categroy_id = intval($item['categroy']);
        $exercise->updata_time = time();
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
        $map = TeacherExerciseChapterCategroyMap::where("exercise_id",$exe_id)->first();
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
            $objective = Objective::where("exe_id",$exe_id)->first();
            $objective->subject = $item['subject'];
            $objective->option = json_encode($option,JSON_UNESCAPED_UNICODE);
            $objective->answer = json_encode($answer,JSON_UNESCAPED_UNICODE);
            $objective->save();
        }else if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
            $subjective = Subjective::where("exe_id",$exe_id)->first();
            $subjective->subject = $item['subject'];
            $subjective->save();
        }else{
            $compositive = new Compositive(['content' => $item['subject']]);
            $exercise->hasOneCompositive()->save($compositive);
            $exercise->hasManySubjective()->create($item['subjective']);
            $exercise->hasManyObjective()->create($item['objective']);
        }
        return $exercise->id;
    }
    
    //作业功能
    /*显示作业列表*/
    public function showJoblist($course = 1,$page = 1)
    {

        $user = Auth::guard('employee')->user();
        $job_all = Job::where(['teacher_id' => $user->id,'course_id' => $course])->get();
        $limit = ($page-1)*10;
        $pageLength = intval($job_all->count()/10)+1;
        $job_list = Job::skip($limit)->take(10)->get();
        $data = array('total' => $job_all->count(),'pageLength' => $pageLength,'currentPage' => $page,'jobs' => array());
        foreach ($job_list as $job){
          $job_type = $job->job_type == Job::TYPE_PERSONAL ? '个人' : '小组';
          $job_status = $job->status == Job::STATUS_PUB ? '已发布' : '未发布';
          array_push($data['jobs'],array(
            'id' => $job->id,
            'title' => $job->title,
            'job_type' => $job_type,
            'pub_time' => $job->pub_time,
            'job_status' => $job_status,
            'deadline' => $job->deadline
            )
          );
        }
        return json_encode($data);
    }
    
    /*保存作业*/
    public function createJob($status = Job::STATUS_UNPUB){
        $input = Input::get();
        $code = 200;
        $user = Auth::guard('employee')->user();
        try{
            $job = new Job;
            $job->teacher_id = $user->id;
            $job->course_id = intval($input['course']);
            $job->title = $input['title'];
            $job->job_type = intval($input['type']);
            $job->score = 0; //intval($input['score'])*100;
            $job->exercise_id = $input['exercise_id'];
            $job->status = $status;
            $job->pub_time = $status == Job::STATUS_UNPUB ? 0 : time();
            $job->deadline = strtotime($input['deadline']);
            $job->save();
        }catch(\Exception $e){
            $code = 201;
        }
        if($status == Job::STATUS_UNPUB){
            $data = array('code' => $code);
            return json_encode($data);
        }else{
            return $job;
        }
    }
    /*发布作业*/
    public function pubJob(){
        $input = Input::get();
        $code = 200;
        $job_id = intval($input['job_id']);
        if(empty($job_id)){
            $job = $this->createJob(Job::STATUS_PUB);
        }else{
            $job = Job::find($job_id);
            if($job->teacher_id != Auth::guard('employee')->user()->id){
                $code = 201;
                $data = array('code' => $code);
                return json_encode($data);
            }
            $job->status = Job::STATUS_PUB;
        }
        $job->save();
        if($job->teacher_id == Auth::guard('employee')->user()->id){
            $work = new work;
            $work->student_id = 1;
            $work->job_id = $job->id;
            $work->course_id = $job->course_id;
            $work->score = 0;
            $work->status = 1;
            $work->start_time = 0;
            $work->sub_time = 0;
            $work->save();
        }
        $data = array('code' => $code);
        return json_encode($data);
    }
}