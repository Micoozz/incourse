<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Input;
use App\Models\Work;
use App\Models\Exercises;
use App\Models\Objective;
use App\Models\Category;
use App\Models\Subjective;
use App\Models\Chapter;
use App\Models\Classes;
use App\Models\Course;
use App\Models\School;
use App\Models\Job;
use Schema;

class ExerciseBookController extends Controller
{
    //public function 
    //习题册 学生的复习、同类型练习 多传一个参数，判断是1是复习，2是同类型练习
    public function freePractice($course = 2, $type_id = 1) {
        $data = [];
        $func ="";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray(); 
        $user = Auth::user();
        $time = date("Y",time());
        $lastTerm = strtotime($time.'-'."08-01");//获取上学期的时间
        $semesterTime = time(); // 现在的时间戳
            if (time() >$lastTerm){
               $jobs = Job::where('course_id', $course)->where('pub_time', '>', $lastTerm)->where('pub_time', '<', strtotime(($time+1).'-'."02-01"))->get()->pluck('id');//今年上学期的作业
            }else{
                $jobs = Job::where('course_id', $course)->where('pub_time', '<', $lastTerm)->where('pub_time', '>', strtotime($time.'-'."02-01"))->get()->pluck('id');//今年上学期的作业
            }
        if ($type_id == 1) {
            $work = Work::select('id')->where(['student_id' => $user->id])->whereIn('job_id', $jobs)->get();//查询出这个学生所有的作业work_id;
        }else{
            $work = Work::select('id')->where(['student_id' => $user->id])->orderBy('id', 'desc')->whereIn('job_id', $jobs)->first();//查询出这个学生所有的作业work_id;
        }
        if (empty($work)) {//该学生还没有作业
            $data = [];
        }else{
            $baseNum = (int)($user->id/1000-0.0001)+1;
            $db_name = 'mysql_stu_work_info_'.$baseNum;
            try{
                $db = DB::connection($db_name);
            }catch(\Exception $e){
                $this->createBase($baseNum);
                $db = DB::connection($db_name);
            }
            $workInfo = $db->table($user->id)->whereIn('work_id', $work)->get()->pluck(['exe_id']);//查询所有的作业
            $exerciseChapter = Exercises::whereIn('id',$workInfo)->pluck('chapter_id')->unique();//要是有同样的chapter_id 则只显示一个
            $minutiaList = Chapter::where('course_id',$course)->whereIn('id',$exerciseChapter)->get()->toArray();//查询出小节的父id 
            $minutia_parentId = array_column($minutiaList, 'parent_id');//所有作业的parent_id
            $chapter = Chapter::where('course_id',$course)->whereIn('id',$minutia_parentId)->get();//查询出大章节信息
            foreach ($chapter as $key => $item) {
                $data[$key]['id'] = $item->id;
                $data[$key]['title'] = $item->title;
                $data[$key]['minutia'] = [];
                foreach ($minutiaList as  $k => $minutia) {
                    $minutiaPat = Chapter::find($minutia['id'])->parent_id; 
                    if ($minutiaPat == $item->id ) {
                        $data[$key]['minutia'][$k]['id'] = $minutia['id'];
                        $data[$key]['minutia'][$k]['title'] = $minutia['title'];
                    }
                }
            }
        }
        return view('student.exerciseBase.review_list',compact('data', 'courseFirst', 'type_id', 'func', 'user', 'courseAll'));
    }
    //习题册 学生的预习
    public function foreExercise($course = 2, $type_id = 4) {
        $func = "";
        $user = Auth::user(); //查看当前老师 
        $schoolType = School::where('id',$user->school_id)->first()->type;
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $class =  Classes::where('id',$user->class_id)->first()->parent_id;
        $gradeTitle = Classes::where('id',$class)->first()->title;
       // 开学时间判断他是上学期还是下学期
        $time = date("Y",time());
        $lastTerm = strtotime($time.'-'."08-01");//获取上学期的时间
        $semesterTime = time(); // 现在的时间戳
        $nextTerm = strtotime(($time+1).'-'."02-01");//获取下学期的时间
        $grade = $time-$gradeTitle+1;
        //1 代表小学 2 代表初中 3 代表大学
        if ($schoolType == 1) {
            if ($grade == 1) {
                $grade = "一年级上";
            }else if ($grade == 2) {
                if ($semesterTime < $lastTerm) {
                    $grade = "一年级下";
                }else{
                    $grade = "二年级上";
                }
            }else if ($grade == 3) {
                if ($semesterTime < $lastTerm) {
                    $grade = "二年级下";
                }else{
                    $grade = "三年级上";
                }
            }else if ($grade == 4) {
                if ($semesterTime < $lastTerm) {
                    $grade = "三年级下";
                }else{
                    $grade = "四年级上";
                }
            }else if ($grade == 5) {
                if ($semesterTime < $lastTerm) {
                    $grade = "四年级下";
                }else{
                    $grade = "；五年级上";
                }
            }else if ($grade == 6) {
                if ($semesterTime < $lastTerm) {
                    $grade = "五年级下";
                }else{
                    $grade = "六年级上";
                }
            }else if ($grade == 7) {
                $grade = "六年级下";
            }
        }else if ($schoolType == 2) {
            if ($grade == 1) {
                $grade = "七年级上";
            }else if ($grade == 2) {
                if ($semesterTime < $lastTerm) {
                    $grade = "七年级下";
                }else{
                    $grade = "八年级上";
                }
            }else if($grade == 3) {
                if ($semesterTime < $lastTerm) {
                    $grade = "八年级下";
                }else{
                    $grade = "九年级上";
                }
            }else if($grade == 4){
                $grade = "九年级下";
            }
        }
        if (time() > $lastTerm){
           $jobs = Job::where('course_id', $course)->where('pub_time', '>', $lastTerm)->where('pub_time', '<', $nextTerm)->get()->pluck('id');
           //今年上学期的作业
        }else{
            $jobs = Job::where('course_id', $course)->where('pub_time', '<', $lastTerm)->where('pub_time', '>', strtotime($time.'-'."02-01"))
            ->get()->pluck('id');//今年下学期的作业
        }
        //如果为空的话说明这个学期还没有布置作业
        if (empty($jobs)) {
            $data = [];
            $grade_id = Chapter::where(['title' => $grade])->first()->id;
            $chapterAll = Chapter::where('parent_id', $grade_id)->get();//所有大章节的Id
            foreach($chapterAll as $key => $chapter){
                $minutia = Chapter::where('parent_id', $chapter->id)->get()->toArray();
                array_push($data, array(
                    'id' => $chapter->id,
                    'title' => $chapter->title,
                    'minutia' => $minutia,
                )); 
            }
        }else{
            $work = Work::select('id')->where(['student_id' => $user->id])->whereIn('job_id', $jobs)->get();
            $baseNum = (int)($user->id/1000-0.0001)+1;
            $db_name = 'mysql_stu_work_info_'.$baseNum;
            try{
                $db = DB::connection($db_name);
            }catch(\Exception $e){
                return $e;
            }
            $workInfo = $db->table($user->id)->whereIn('work_id', $work)->get()->pluck(['exe_id']);//查询所有的作业
            $exerciseChapter = Exercises::whereNotIn('id',$workInfo)->pluck('chapter_id')->unique();//除了学过的章节id
            $minutiaList = Chapter::where('course_id',$course)->whereIn('id',$exerciseChapter)->get()->toArray();//查询出小节的父id
            $minutia_parentId = array_column($minutiaList, 'parent_id');//所有作业的parent_id
            $chapter = Chapter::where('course_id',$course)->whereIn('id',$minutia_parentId)->get();//查询出大章节信息
            foreach ($chapter as $key => $item) {
                $data[$key]['id'] = $item->id;
                $data[$key]['title'] = $item->title;
                $data[$key]['minutia'] = [];
                foreach ($minutiaList as  $k => $minutia) {
                    $minutiaPat = Chapter::find($minutia['id'])->parent_id; 
                    if ($minutiaPat == $item->id ) {
                        $data[$key]['minutia'][$k]['id'] = $minutia['id'];
                        $data[$key]['minutia'][$k]['title'] = $minutia['title'];
                    }
                }
            }
        }
        return view("student.exerciseBase.review_list",compact('data', 'courseFirst', 'type_id', 'user', 'courseAll', 'func'))
    }
    //先查询所有这位学生的作业错题本
    public function errorsExercise($course = 2, $type_id = 3) {
        $func = "";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $user = Auth::guard('student')->user();
        $data = [];
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            $data = [];
            return $data;
        }
        $exe_id = $db->table($user->id)->where('score', 0)->get()->pluck(['exe_id']);//查询所有的错题
        $exerciseChapter = Exercises::whereIn('id',$exe_id)->pluck('chapter_id')->unique();
        $minutiaList = Chapter::where('course_id',$course)->whereIn('id',$exerciseChapter)->get()->toArray();//查询出小节的父id 
        $minutia_parentId = array_column($minutiaList, 'parent_id');//所有作业的parent_id
        $chapter = Chapter::where('course_id',$course)->whereIn('id',$minutia_parentId)->get();//查询出大章节信息
        foreach ($chapter as $key => $item) {
            $data[$key]['id'] = $item->id;
            $data[$key]['title'] = $item->title;
            $data[$key]['minutia'] = [];
            foreach ($minutiaList as  $k => $minutia) {
                $minutiaPat = Chapter::find($minutia['id'])->parent_id;
                if ($minutiaPat == $item->id) {
                    $data[$key]['minutia'][$k]['id'] = $minutia['id'];
                    $data[$key]['minutia'][$k]['title'] = $minutia['title'];
                }
            }
        }
         return view('student.exerciseBase.review_list',compact('data', 'courseFirst', 'type_id', 'user', 'courseAll', 'func'));
    }
    //这个学生某个章节错了多少题
    public function chapterErrorExercise($type_id,$course,$chapter) {
        $abcList = range("A","Z");
        $data = [];
        $func = "";
        $user = Auth::user();
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        $errorsExeId = $db->table($user->id)->where('score', 0)->get()->pluck('exe_id');//查询这个学生的所有的错题
        $chapterExercises = Exercises::select('id', 'exe_type', 'categroy_id', 'chapter_id')->whereIn('id',$errorsExeId)->get();//查询这个学生单个章节的所有错题
        foreach($chapterExercises as $exercise) { 
            $categroy_id = Category::find($exercise->categroy_id)->id;
            $categroy_title = Category::find($exercise->categroy_id)->title;
            if ($exercise->exe_type == Exercises::TYPE_OBJECTIVE) {
                $objective = Objective::where('exe_id',$exercise->id)->first();
                $exercisesSort = $db->table($user->id)->select('sort')->where('exe_id',$exercise->id)->first();
                //查询这个学生的单个的错题
                $option = [];
                if (!empty($exercisesSort->sort)) {//单选题 多选题 排序题要做特殊处理
                    foreach(json_decode($exercisesSort->sort) as $sort){
                        array_push($option,json_decode($objective->option,true)[$sort-1]);
                    }
                }
                array_push($data, array(
                'id' => $exercise->id,
                'categroy_id' => $categroy_id,
                'categroy_title' => $categroy_title,
                'subject' => $objective->subject,
                'options' => $option,
            ));
            }else if ($exercise->exe_type == Exercises::TYPE_SUBJECTIVE) {
                $subjective = Subjective::where('exe_id',$exercise->id)->first();
                array_push($data, array(
                    'id' => $exercise->id,
                    'categroy_id' => $categroy_id,
                    'categroy_title' => $categroy_title,
                    'subject' => $subjective->subject,
                ));
            }
        }
        return view("student.exerciseBase.wrongNotebook_showWorkList", compact('data', 'user', 'func', 'courseFirst', 'courseAll', 'type_id', 'abcList'));
    }
    //错题的题型
    public function errorExerciseInfo($type_id, $course ,$exe_id) {
        $data = [];
        $abcList = range("A","Z");
        $func = "";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $user = Auth::user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        $errorExercise = $db->table($user->id)->where('exe_id', $exe_id)->first();
        $errorReports = Exercises::find($exe_id);
        if ($errorReports->exe_type == Exercises::TYPE_OBJECTIVE) {
            $objective = Objective::where('exe_id', $exe_id)->first();
            $option = [];
            if (!empty($errorExercise->sort)) {
                foreach(json_decode($errorExercise->sort) as $sort){
                    array_push($option,json_decode($objective->option,true)[$sort-1]);
                }
            }
            $answer_list = json_decode($objective->answer, true);//标准答案的记录
            $work_answer = json_decode($errorExercise->answer,true);//自己答题情况
            array_push($data, array(
                'id' => $errorReports->id,
                'categroy_id' => $errorReports->categroy_id,
                'subject' => $objective->subject,
                'options' => $option,
                'answer' => $answer_list['answer'],
                'wrokAnswer' => $work_answer['answer'],
                'score' => $errorReports->score/100,
                'second' => $errorExercise->second,
                'sameScore' => $errorExercise->score,
            ));
        }else if ($errorReports->exe_type == TYPE_SUBJECTIVE) {
            dd(11);
        }
        return view('student.exerciseBase.wrongNotebook_showAnalysis', compact('data', 'abcList', 'user', 'func', 'courseAll', 'courseFirst', 'type_id'));
    }

    //查看学生所有的错题练习的得分
    public function errorExerciseScore(){
        $input = Input::get();
        $user = Auth::user();
        $code = 200;
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            $this->createBase($baseNum);
            $db = DB::connection($db_name);
        }
        if(!Schema::connection($db_name)->hasTable($user->id)){
            Schema::connection($db_name)->create($user->id, function ($table) {
                $table->integer('work_id');
                $table->integer('exe_id')->nullable();
                $table->integer('parent_id')->nullable();
                $table->integer('type')->nullable();
                $table->text('answer')->nullable();
                $table->integer('second')->nullable();
                $table->smallInteger('score')->default(0);
                $table->string('comment',200)->nullable();
                $table->string('sort',200)->nullable();
            });
        }
    }
    //当前学生收藏的所有的题目
    public function studentCollect(){

    }

//学生复习，预习，同步练习，错题本做的作业页面 状态码3代表错题本
    public function practice($course, $chapter_id, $type_id){
        $data =[];
        $user = Auth::user();
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray(); 
        if ($type_id != 3) {//查询出随机的1道题的内容//复习、同类型习题、预习
            $randomExeercise = Exercises::where(['chapter_id' => $chapter_id, 'course' => $course, 'exe_type' => 1])->whereNotIn()->inRandomOrder()->take(1)->get();
        }else{
            $baseNum = (int)($user->id/1000-0.0001)+1;
            $db_name = 'mysql_stu_work_info_'.$baseNum;
            try{
                $db = DB::connection($db_name);
            }catch(\Exception $e){
                return $e;
            }
            $errorsExeId = $db->table($user->id)->where('score', 0)->where('type', '<>', 3)->get()->pluck('exe_id');;
            //查询这个学生的所有的错题
            //这个章节下拿出随机一道
            $chapterExercises = Exercises::select('id', 'exe_type', 'categroy_id', 'chapter_id')->where(['chapter_id' => $chapter_id, 'exe_type' => 1])->whereIn('id',$errorsExeId)->inRandomOrder()->first();
        }
            $categroy = Category::find($chapterExercises->categroy_id);
            $categroy_id = $categroy->id;
            $categroy_title = $categroy->title;
            $abcList = range("A","Z");
            $objective= Objective::where('exe_id', $chapterExercises->id)->first();
            $options = json_decode($objective->option, true);
            if ($chapterExercises->categroy_id == Exercises::CATE_FILL) {
                $objective->subject = preg_replace('/(?<=contenteditable\=\")false(?=\")/', 'true', $objective->subject);
            }
            shuffle($options);
            array_push($data, array(
                'id' => $chapterExercises->id,
                'categroy_id' => $categroy_id,
                'categroy_title' => $categroy_title,
                'subject' => $objective->subject,
                'options' => $options,
                'answer' => json_decode($objective->answer, true),
                'score' => $chapterExercises->score/100,
            ));
        return view('student.exerciseBase.foreExercise_content', compact('data', 'course', 'abcList' , 'user', 'courseAll', 'courseFirst', 'type_id'));
    }
//预习--做题
/*    public function foreExerciseDoWork($course = 2) {
        $func = "";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $user = Auth::guard('student')->user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        return view('student.exerciseBase.foreExercise_content',compact("func", "user", 'courseAll', 'courseFirst'));
    }*/
//预习列表
    /*public function foreExerciseList($course = 2) {
        $func = "";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $user = Auth::guard('student')->user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        return view('student.exerciseBase.foreExercise_contentList',compact("func", "user", 'courseAll', 'courseFirst'));
    }*/
//答题结果
    public function submitResuit_foreExercise($course = 2) {
        $func = "";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $user = Auth::guard('student')->user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        return view('student.exerciseBase.submitResult_foreExercise',compact("func", "user", 'courseAll', 'courseFirst'));
    }
//收藏
    public function collect($course = 2) {
        $func = "";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $user = Auth::guard('student')->user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        return view('student.exerciseBase.exercise_collect',compact("func", "user", 'courseAll', 'courseFirst'));
    }
}