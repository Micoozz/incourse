<?php
namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Input;
use DB;
use App\Models\ClassTeacherCourseMap;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Job;
use App\Models\Exercises;
use App\Models\Category;
use App\Models\Objective;
use App\Models\Subjective;
use App\Models\Compositive;
use App\Models\Chapter;
use App\Models\TeacherExerciseChapterCategoryMap;
use App\Models\Student;
use App\Models\Work;
use App\Models\Courseware;
use App\Models\CoursewareTeacherCourseMap;
use App\Models\Employee;
use App\Models\School;

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
    const ACT_ADD_JOB = 'addJob';
    const ACT_ADD_COURSEWARE = 'addCourseware';
    const ACT_EDIT_COURSEWARE = 'edit-courseware';
    const ACT_SEARCH = 'search';

    protected $class_id;
    private $course_id;

    public function __construct(Request $request){
        
    }



    /**
     * 学习中心主体页面
     */
    /*获取教师关联班级科目*/
    private function getClassCourse($teacher_id){
        $map_list = ClassTeacherCourseMap::where('teacher_id',$teacher_id)->get();//查询出所有老师关联的数据 
        $class_course = array();
        foreach ($map_list as $map) {
            $class = Classes::find($map->class_id);
            $grade = Classes::find($class->parent_id);
            $course = Course::find($map->course_id);
            array_push($class_course,array('title' => $grade->title."届".$class->title.$course->title,'class_id' => $map->class_id,'course_id' => $map->course_id));
        }
        return $class_course;
    }
    /*云平台教师绑定班级页面*/
    public function bindClass($grade_id){
        $title = "绑定班级";
        $class_list = Classes::where('parent_id',$grade_id)->pluck('title','id');
        $course_list = Course::pluck('title','id');
        return view('teacher.pf-login-teacher',compact('title','grade_id','class_list','course_list'));
    }
    /*教学中心页面*/
    public function teachingCenter($class_id = null,$course_id = null){
        return $this->addHomework($class_id,$course_id);
    }
    /*作业管理页面*/
    public function homeworkManage($class_id = null,$course_id = null){
        return $this->addHomework($class_id,$course_id);
    }
    /*添加作业页面*/
    public function addHomework($class_id = null,$course_id = null){
        //echo php_info();
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
        return view('teacher.content.addHomework',compact("title",'class_course','class_id','course_id'));
    }
    /*添加个人作业页面*/
    public function addHomeworkPer($class_id,$course_id){
        $title = "添加作业";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        $unit_list = parent::getUnit($course_id);
        return view('teacher.content.addHomework-personal',compact("title",'class_course','class_id','course_id','unit_list'));
    }
    /*批改作业页面*/
    public function correct($class_id,$course_id,$type = Job::TYPE_PERSONAL,$unit_id = null,$section_id = null){
        $title = "批改作业";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        $job_list = Job::where(['teacher_id' => $teacher->id,'job_type' => $type,'class_id' => $class_id,'course_id' => $course_id])->orderBy('pub_time','desc')->paginate(10);
        foreach($job_list as $job){
            $job->sub_count = $job->hasManyWork()->where('status','>=',2)->get()->count();
            $job->count = $job->hasManyWork()->get()->count();
            $avg_score = empty($job->sub_count) ? 0 : $job->hasManyWork()->where('status','>=',2)->sum('score') / $job->sub_count;
            $job->avg_ratings = round($avg_score / $job->score,4);
        }
        // $job_section_list = Job::where(['teacher_id' => $teacher->id,'job_type' => $type,'class_id' => $class_id])->pluck('chapter_id');
        // $section_id_list = Chapter::whereIn('id',$job_section_list)->pluck('parent_id');
        // $unit_list = Chapter::whereIn('id',$section_id_list)->where('course_id',$course_id)->pluck('title','id');
        // $section_list = Chapter::where('parent_id',$unit_id)->whereIn('id',$job_section_list)->pluck('title','id');
        return view('teacher.content.correct',compact("title",'class_course','class_id','course_id','job_list','type','unit_id','section_id'));
    }
    public function correctWork($class_id,$course_id,$job_id){
        $title = "批改作业";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        $work_list = Work::where(['job_id' => $job_id])->where('status','>=',Work::STATUS_SUB)->paginate(10);
        foreach($work_list as $work){
            $student = Student::find($work->student_id);
            $work->student_name = $student->name;
            $work->total =$work->belongsToJob()->first()->score;
            $work->ratings = round($work->score / $work->total,4);
        }
        return view('teacher.content.correct_work',compact("title",'class_course','class_id','course_id','work_list'));
    }
    public function correctDetail($class_id,$course_id,$work_id){
        $title = "批改作业";
        $abcList = range("A","Z");
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        $work = Work::find($work_id);
        $job_id = $work->job_id;
        $exercise_id_list = json_decode(Job::find($work->job_id)->exercise_id);
        $student = Student::find($work->student_id);
        $data = array('student' => $student,'un_correct' => [],'done_correct' => []);
        $exercise_list = Exercises::whereIn('id',$exercise_id_list)->get();
        $baseNum = (int)($work->student_id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        $work->title = $work->belongsToJob()->first()->title;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            throw $e;
        }
        $work->title = $work->belongsToJob()->first()->title;
        foreach ($exercise_list as $exercise) {
            $cate_title = Category::find($exercise->categroy_id)->title;
            $exercise->cate_title = $cate_title;
            $exercise->score = $exercise->score/100;
            $work_info = $db->table($work->student_id)->where(['work_id' => $work->id,'exe_id' => $exercise->id])->first();
            $exercise->student_answer = json_decode($work_info->answer,TRUE)["answer"];
            $exercise->correct = json_decode($work_info->correct,true);
            if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
                $subjective = $exercise->hasManySubjective->first();
                $exercise->subject = $subjective->subject;
                $exercise->answer = array('自由发挥');
            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $objective = $exercise->hasManyObjective->first();
                $exercise->subject = $objective->subject;
                $exercise->options = json_decode($objective->option,TRUE);
                $exercise->answer = json_decode($objective->answer,TRUE)["answer"];
                if($exercise->categroy_id == Exercises::CATE_FILL){
                    $exercise->student_answer = json_encode($exercise->student_answer,JSON_UNESCAPED_UNICODE);
                }
            }
//          else{
//              
//          }
            if($work_info->status == 1){
                array_push($data['un_correct'],$exercise);
            }elseif($work_info->status == 2){
                array_push($data['done_correct'],$exercise);
            }
        }
        //dd($exercise_list);
        return view('teacher.content.correctDetail',compact("title",'class_course','class_id','course_id','data','work','abcList','job_id'));
    }
    /*上传习题页面*/
    public function uploadExercise($class_id,$course_id,$exe_id = null){
        $title = "上传习题";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        $unit_list = parent::getUnit($course_id);
        $categroy_list = parent::getCategory($course_id);
        return view('teacher.content.uploadExercise',compact("title",'class_course','class_id','course_id','unit_list','categroy_list','exe_id'));
    }
    /*习题库页面*/
    public function exercise(Request $request,$class_id,$course_id,$action = null){
        $title = "习题库";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        $chapter_list = Chapter::where('course_id',$course_id)->pluck("id");
        $parameter = [];
        if(empty($action) || $action == self::ACT_ADD_JOB || $action == self::ACT_SEARCH){
            if($action != self::ACT_SEARCH){
                $data = Exercises::whereIn('chapter_id',$chapter_list)->paginate(10);
            }else{
                $chapter_id = $request->chapter;
                $search_chapter_list = [$chapter_id];
                while(!Chapter::whereIn('parent_id',$search_chapter_list)->pluck('id')->isEmpty()){
                    $search_chapter_list = Chapter::whereIn('parent_id',$search_chapter_list)->pluck('id');
                }
                $auth_id = $request->auth;
                $auth_type = $request->type;
                $categroy_id = $request->categroy_id;
                $parameter['chapter'] = $chapter_id;
                $parameter['auth'] = $auth_id;
                $parameter['type'] = $auth_type;
                $parameter['categroy_id'] = $categroy_id;
                $data = Exercises::where(function($query) use ($search_chapter_list,$auth_id,$auth_type,$categroy_id,$chapter_id){
                    if(!empty($chapter_id)){
                        $query->whereIn('chapter_id',$search_chapter_list);
                    }
                    if(!empty($auth_id)){
                        $query->where($auth_type,$auth_id);
                    }
                    if(!empty($categroy_id)){
                        $query->where('categroy_id',$categroy_id);
                    }
                })->toSql();
                dd($data);
            }
            $teacher_id_list = Exercises::whereIn('chapter_id',$chapter_list)->pluck('teacher_id');
            $school_id_list = Employee::whereIn('id',$teacher_id_list)->pluck('school_id');
            $school_list = School::whereIn('id',$school_id_list)->pluck('title','id');
            $version_list = Chapter::where('parent_id',0)->pluck('title','id');
            $categroy_list = parent::getCategory($course_id);
        }elseif($action == self::ACT_ADD_COURSEWARE){
            $data = Exercises::whereIn('chapter_id',$chapter_list)->where(function($query){
                $query->where('categroy_id',Exercises::CATE_RADIO)->orWhere('categroy_id',Exercises::CATE_CHOOSE)->orWhere('categroy_id',Exercises::CATE_JUDGE);
            })->paginate(10);
        }elseif($action == self::ACT_MY_UPLOAD){
            if($teacher->id == 1){
                $data = Exercises::whereIn('chapter_id',$chapter_list)->paginate(10);
            }else{
                $data = Exercises::where('teacher_id',$teacher->id)->whereIn('chapter_id',$chapter_list)->paginate(10);
            }
        }
        foreach ($data as $exercise) {
            $cate_title = Category::find($exercise->categroy_id)->title;
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
        return view('teacher.content.exercise',compact("title",'class_course','class_id','course_id','data','action','school_list','version_list','categroy_list','parameter'));
    }

    /*课堂课件页面*/
     public function courseWare($class_id = null,$course_id = null){
        $title = "课堂课件";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id); 
        $map = ClassTeacherCourseMap::where('teacher_id',$teacher->id)->first();
        if(empty($class_id)){
            $class_id = $map->class_id;
        }
        if(empty($course_id)){
            $course_id = $map->course_id;
        }
        $cw_id_list = CoursewareTeacherCourseMap::where(['teacher_id' => $teacher->id,'course_id' => $course_id])->pluck('cw_id');
        $courseware_list = Courseware::whereIn('id',$cw_id_list)->paginate(10);
        return view('teacher.courseware.courseware',compact("title",'class_course','class_id','course_id','courseware_list'));
    }
    //上传课件
    public function upLoadCourseware($class_id ,$course_id,$edit = null){
        $title = "上传课件";
        $teacher = Auth::guard("employee")->user();
        if(empty($edit)){
            $class_course = $this->getClassCourse($teacher->id);
        }else if($edit == self::ACT_EDIT_COURSEWARE){
            dd(11);
        }
        return view('teacher.courseware.upLoadCourseware',compact("title",'class_course','class_id','course_id'));
    }
    //自由做题 --> 编辑选项
    public function setQuestions($class_id ,$course_id,$cw_id){
        $title = "编辑选项";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        return view('teacher.courseware.setQuestions',compact("title",'class_course','class_id','course_id','cw_id','edit'));
    }

    // 课件详情
    public function coursewareDetail($class_id ,$course_id,$cw_id){
        $title = "课件详情";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        $courseware = Courseware::find($cw_id);
        $auth_id = CoursewareTeacherCourseMap::where(['cw_id' => $courseware->id,'is_auth' => 1])->first()->teacher_id;
        $courseware->auth_name = Employee::find($auth_id)->name;
        $courseware->file = json_decode($courseware->file,true);
        $courseware->exercise_id = json_decode($courseware->exercise_id,true);
        return view('teacher.courseware.coursewareDetail',compact("title",'class_course','class_id','course_id','courseware'));
    }

    //开始答题 --> 结束答题 (习题库)
    public function answerStart($class_id ,$course_id,$cw_id,$exercise_id){
        $title = "开始答题";
        $abcList = range("A","Z");
        $data = collect();
        $student_list = Student::where('class_id',$class_id)->get();
        $exercise = Exercises::find($exercise_id);
        $objective = $exercise->hasManyObjective()->first();
        $exercise->subject = $objective->subject;
        $exercise->cate_title = Category::find($exercise->categroy_id)->title;
        $exercise->options = json_decode($objective->option,TRUE);
        $exercise->answer = json_decode($objective->answer,TRUE)["answer"];
        $cw_exercise_id_list = json_decode(Courseware::find($cw_id)->exercise_id,true);
        foreach($cw_exercise_id_list as $item){
            if(key($item) == $exercise_id){
                $next_exercise_id_index = key($cw_exercise_id_list)+1;
                $exercise->count_down = $item[key($item)];
                break;
            }
            next($cw_exercise_id_list);
        }
        $data->next_exercise_id = key($cw_exercise_id_list) < count($cw_exercise_id_list)-1 ? key($cw_exercise_id_list[$next_exercise_id_index]) :  null;
        $data->exercise_count = count($cw_exercise_id_list);
        $data->current = key($cw_exercise_id_list);
        
        $data->student_list = $student_list;
        $data->exercise = $exercise;
        return view('teacher.courseware.answerStart',compact("title",'class_id','course_id','data','abcList','cw_id'));
    }
    //开始答题 --> 结束答题 (自由)
    public function answerStart_freedom($class_id ,$course_id,$cw_id){
        $title = "开始答题";
        $data = collect();
        $student_list = Student::where('class_id',$class_id)->get();
        $data->student_list = $student_list;
        return view('teacher.courseware.answerStart_freedom',compact("title",'class_id','course_id','data','cw_id'));
    }
    //添加学生cardID
    public function addRefreshCards($class_id ,$course_id = null){
        $teacher = Auth::guard("employee")->user();
        $students = Student::where('class_id', $class_id)->get();
        $title = "添加学生cardID";
        $teacher = Auth::guard("employee")->user();
        $class_course = $this->getClassCourse($teacher->id);
        return view('teacher.courseware.addRefreshCards',compact("title",'class_course','class_id','course_id', 'students'));
    }
    //绑定学生cardID
    public function bindCardId($student_id, $scantron_id){
        $student = Student::find($student_id);
        $student->scantron_id = $scantron_id;
        $student->save();
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
            $class = Classes::find($map->class_id);
            $grade = Classes::find($class->parent_id);
            $course = Course::find($map->course_id);
            array_push($class_course,array('title' => $grade->title.$class->title.$course->title,'class_id' => $map->class_id,'course_id' => $map->course_id));
        }
    	$select_data = array();
    	if($mod == self::MOD_HOMEWORK){
    		$class = Classes::find($class_id);
    		$grade = Classes::find($class->parent_id);
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
		            $cate_title = Category::find($exercise->categroy_id)->title;
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
		            $cate_title = Category::find($exercise->categroy_id)->title;
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
		        // $select_categroy = Category::where("course_id","like","%{$course_id}%")->get();
		        // $exer_chapter_list = Exercises::where("teacher_id",$teacher->id)->whereIn('chapter_id',$chapter_list)->pluck("chapter_id");
		        // $parent_section = Chapter::whereIn("id",$exer_chapter_list)->pluck("parent_id");
		        // $parent_unit = Chapter::whereIn("id",$parent_section)->pluck("parent_id");
		        // $select_unit = Chapter::whereIn("id",$parent_section)->get();
		        // $select_grade = Chapter::whereIn("id",$parent_unit)->get();
		        // $select_data["select_categroy"] = $select_categroy;
		        // $select_data["select_unit"] = $select_unit;
		        // $select_data["select_grade"] = $select_grade;
		        $map = TeacherExerciseChapterCategoryMap::where("teacher_id",$teacher->id)->get()->toArray();
		        $select_data["select_categroy"] = Category::whereIn("id",array_column($map, "categroy_id"))->pluck("title","id");
		        $select_data["select_unit"] = Chapter::whereIn("id",array_column($map, "unit_id"))->pluck("title","id");
		        $select_data["select_grade"] = Chapter::whereIn("id",array_column($map, "grade_id"))->pluck("title","id");
		        $select_data["select_section"] = Chapter::whereIn("id",array_column($map, "section_id"))->pluck("title","id");
    		}else if($func == self::FUNC_ADD_EXERCISE){
				$unit_list = parent::getUnit();
    			$categroy_list = parent::getCategory($course_id);
    			if(!empty($universal)){
    				$exercise = Exercises::find($universal);
    				$map = TeacherExerciseChapterCategoryMap::where("exercise_id",$exercise->id)->first();
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
        $grade = Classes::find($input["grade_id"]);
        if(empty($grade) || $grade->school_id != $teacher->school_id){
            return json_encode(["code" => 202]);
        }
        $class = Classes::where(['parent_id' => $grade->id,'title' => $input['create-class']."班"])->orWhere('id',$input['select-class'])->first();
        if(empty($class)){
            $class = new Classes;
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
        $exercise->teacher_id = $user->id;
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
        else if($exercise->categroy_id == Exercises::CATE_SHORT || 
            $exercise->categroy_id == Exercises::CATE_COMPUTE || 
            $exercise->categroy_id == Exercises::CATE_ANSWER)
        {
            $exercise->exe_type = Exercises::TYPE_SUBJECTIVE;
            $exercise->score = 10 * 100;
        }
        else
        {
            $exercise->exe_type = Exercises::TYPE_COMPOSITIVE;
        }
        $exercise->save();
        $map = new TeacherExerciseChapterCategoryMap;
        $map->teacher_id = $user->id;
        $map->exercise_id = $exercise->id;
        $input_unit = Chapter::find($chapter["unit"]);
        $map->grade_id = Chapter::find($input_unit->parent_id)->id;
        $map->unit_id = $chapter["unit"];
        $map->section_id = $chapter["section"];
        $map->categroy_id = intval($item['categroy']);
        $result = $map->save();
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
        else if($exercise->categroy_id == Exercises::CATE_SHORT || 
            $exercise->categroy_id == Exercises::CATE_COMPUTE || 
            $exercise->categroy_id == Exercises::CATE_ANSWER)
        {
            $exercise->exe_type = Exercises::TYPE_SUBJECTIVE;
            $exercise->score = 10 * 100;
        }
        else
        {
            $exercise->exe_type = Exercises::TYPE_COMPOSITIVE;
        }
        $exercise->save();
        $map = TeacherExerciseChapterCategoryMap::where("exercise_id",$exe_id)->first();
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
    public function getEditExecrise($exe_id){
        $exercise = Exercises::find($exe_id);
        $map = TeacherExerciseChapterCategoryMap::where("exercise_id",$exercise->id)->first();
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
    

    public function getExerciseList(){
        $input = Input::get();
        $exercise_id_arr = $input['id_list'];
        $data = Exercises::whereIn("id",$exercise_id_arr)->orderByRaw(DB::raw("FIELD(id, ".implode(',', $exercise_id_arr).')'))->get();
        foreach ($data as $exercise) {
            $section = Chapter::find($exercise->chapter_id);
            $unit = Chapter::find($section->parent_id);
            $exercise->chapter_ttile = $unit->title."    ".$section->title;
            $cate_title = Category::find($exercise->categroy_id)->title;
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
        return json_encode($data,JSON_UNESCAPED_UNICODE);
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
        $job_score = 0;
        foreach($input['exercise_id'] as $eid){
            $job_score += Exercises::find($eid)->score;
        }
        try{
            $job = new Job;
            $job->teacher_id = $user->id;
            $job->class_id = intval($input['class']);
            $job->course_id = intval($input['course']);
            $job->title = $input['title'];
            $job->job_type = intval($input['type']);
            $job->score = $job_score;
            $job->content = $input['content'];
            $job->exercise_id = json_encode($input['exercise_id']);
            $job->status = $status;
            $job->pub_time = $status == Job::STATUS_UNPUB ? 0 : time();
            $job->deadline = intval($input['deadline']);
            $job->save();
        }catch(\Exception $e){
            // $code = 201;
            throw $e;
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
        $job_id = isset($input['job_id']) ? intval($input['job_id']) : 0;
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
            $student_id_list = Student::where('class_id',$input['class'])->pluck('id');
            foreach($student_id_list as $stu_id){
                $work = new Work;
                $work->student_id = $stu_id;
                $work->job_id = $job->id;
                $work->course_id = $job->course_id;
                $work->score = 0;
                $work->status = Work::STATUS_OPEN;
                $work->start_time = 0;
                $work->sub_time = 0;
                $work->save();
            }
        }
        $data = array('code' => $code);
        return json_encode($data);
    }
    /*获取答题卡列表*/
    public function getScantronIdList(){
        $input = Input::get();
        $class = Classes::where("receiver_id",$input["receiver_id"])->first();
        $scantron_id_list = Student::where("class_id",$class->id)->pluck("scantron_id");
        return json_encode($scantron_id_list);
    }
    /*上传课件*/
    public function createCourseware(){
        $input = Input::get();
        $teacher_id = Auth::guard('employee')->user()->id;
        $exercise_id = array();
        foreach($input['exercise_id'] as $eid){
            array_push($exercise_id,array($eid => intval($input['count_down'])));
        }
        $cw = new Courseware;
        $cw->title = $input['title'];
        $cw->content = $input['content'];
        $cw->exercise_id = json_encode($exercise_id);
        $cw->file = json_encode($input['file'],JSON_UNESCAPED_UNICODE);
        $cw->create_time = time();
        $cw->save();
        $map = new CoursewareTeacherCourseMap;
        $map->cw_id = $cw->id;
        $map->teacher_id = $teacher_id;
        $map->course_id = intval($input['course_id']);
        $map->is_auth = 1;
        $map->save();
    }
    /*提交答题卡数据*/
    public function subTrueScantron(){
        $input = Input::get();
        foreach($input['card_list'] as $card){
            $student = Student::where('scantron_id',$card)->first();
            $student->class_score += 1;
            $student->save();
        }
    }
    /*上传批注*/
    public function uplaodCorrect(){
        $input = Input::get();
        $code = 200;
        $student_id = $input['student_id'];
        $baseNum = (int)($student_id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        $status = true;
        $work = Work::find($input['work_id']);
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            $code = 201;
        }
        foreach ($input['data'] as $item) {
            $score = empty($item['score']) ? 0 :intval($item['score']);
            $correct = empty($item['data']) ? null : json_encode($item['data'],JSON_UNESCAPED_UNICODE);
            if($score != -1){
                $stu_answer_info = $db->table($student_id)->where(['work_id' => $work->id,'exe_id' => $item['id']])->update(['answer' => json_encode(array("answer" => array($item['student_answer'])), JSON_UNESCAPED_UNICODE),'score' => $score * 100,'correct' => $correct,'status' => 2]);
                $work->status = Work::STATUS_CORRECTING;
                $work->score += $score * 100;
                $work->save();
            }else{
                $status = false;
            }
        }
        if($status){
            $work->status = Work::STATUS_CORRECT_DONE;
            $work->save();
        }
        return json_encode(['code' => $code]);
    }
    /*添加章节页面*/
    public function addChapter(){
        $course = Course::pluck('title','id');
        $version = Chapter::where('parent_id',0)->pluck('title','id');
        return view('addChapter',compact('course','version'));
    }
    public function getChapter($course_id,$id){
        $data = Chapter::where(function ($query) use ($course_id,$id) {
            $query->where(['course_id' => $course_id,'parent_id' => $id]);
        })->orWhere(function ($query) use ($course_id,$id) {
            $query->where(['course_id' => 0,'parent_id' => $id]);
        })->pluck('title','id');
        return json_encode($data);
    }
    public function getTeacher($school_id){
        $teacher_list = Employee::where('school_id',$school_id)->pluck('name','id');
        return $teacher_list;
    }
    public function createChapter(){
        $input = Input::get();
        $sel = $input['sel'];
        $inp = $input['input'];
        foreach($sel as $item){
            if(!empty($item['value'])){
                if($item['name'] == "c-sel"){
                    $c = Course::find($item["value"]);
                }elseif($item['name'] == "v-sel"){
                    $v = Chapter::find($item["value"]);
                }elseif($item['name'] == "g-sel"){
                    $g = Chapter::find($item["value"]);
                }elseif($item['name'] == "u-sel"){
                    $u = Chapter::find($item["value"]);
                }elseif($item['name'] == "s-sel"){
                    $s = Chapter::find($item["value"]);
                }
            }
        }
        foreach($inp as $item){
            if($item['name'] == "c"){
                $c = new Course;
                $c->title = $item['value'];
                $c->save();
            }elseif($item['name'] == "v"){
                $v = new Chapter;
                $v->parent_id = 0;
                $v->title = $item['value'];
                $v->course_id = 0;
                $v->save();
            }elseif($item['name'] == "g"){
                $g = new Chapter;
                $g->parent_id = $v->id;
                $g->title = $item['value'];
                $g->course_id = 0;
                $g->save();
            }elseif($item['name'] == "u"){
                $u = new Chapter;
                $u->parent_id = $g->id;
                $u->title = $item['value'];
                $u->course_id = $c->id;
                $u->save();
            }elseif($item['name'] == "s"){
                $s = new Chapter;
                $s->parent_id = $u->id;
                $s->title = $item['value'];
                $s->course_id =$c->id;
                $s->save();
            }
        }
    }
    //user-upload/teacher(student)/$id/images(file)/
    public function test(){
        $name = substr($_FILES['file']['name'],0,strrpos($_FILES['file']['name'],'.'));
        $teacher_id = Auth::guard('employee')->user()->id;
        return parent::UploadFile('test/file/'.$teacher_id.'/',$name);
    }
}
    