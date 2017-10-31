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
use Redirect;
use Schema;

class ExerciseBookController extends Controller
{
    private function createBase($baseNum){
        $code = parent::createDatabase($baseNum);
        if($code === 200){
            $envArray = ['DB_DATABASE_STU_WORK_INFO_'.$baseNum.' = stu_work_info_'.$baseNum];
            parent::modifyConfFile('.env',11,$envArray);
            $DBConfArray = ["",
            "\t\t'mysql_stu_work_info_".$baseNum. "' => [",
            "\t\t\t'driver' => 'mysql',",
            "\t\t\t'host' => env('DB_HOST', '127.0.0.1'),",
            "\t\t\t'port' => env('DB_PORT', '3306'),",
            "\t\t\t'database' => env('DB_DATABASE_STU_WORK_INFO_".$baseNum."', 'forge'),",
            "\t\t\t'username' => env('DB_USERNAME', 'forge'),",
            "\t\t\t'password' => env('DB_PASSWORD', ''),",
            "\t\t\t'unix_socket' => env('DB_SOCKET', ''),",
            "\t\t\t'charset' => 'utf8mb4',",
            "\t\t\t'collation' => 'utf8mb4_unicode_ci',",
            "\t\t\t'prefix' => 'work_table_',",
            "\t\t\t'strict' => true,",
            "\t\t\t'engine' => null,",
            "\t\t],"];
            parent::modifyConfFile('config'.DIRECTORY_SEPARATOR.'database.php',55,$DBConfArray);
            config(['database.connections.mysql_stu_work_info_'.$baseNum => 
                ['driver' => 'mysql',
                'host' => env('DB_HOST','127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => 'stu_work_info_'.$baseNum,
                'username' => env('DB_USERNAME', 'forge'),
                'password' => env('DB_PASSWORD', ''),
                'unix_socket' => env('DB_SOCKET', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => 'work_table_',
                'strict' => true,
                'engine' => null,
            ]]);
        }
    }
    //习题册 学生的复习、同类型练习 多传一个参数，判断是1是复习，2是同类型练习
    public function freePractice($course, $type_id) {
        $data = [];
        $func ="";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray(); 
        $user = Auth::user();
        $time = date("Y",time());
        $lastTerm = strtotime($time.'-'."08-01");//获取上学期的时间
        $semesterTime = time(); // 现在的时间戳
        if (time() >$lastTerm){
           $jobs = Job::where('course_id', $course)->where('pub_time', '>', $lastTerm)->get()->pluck('id');//今年上学期的作业
        }else{
            $jobs = Job::where('course_id', $course)->where('pub_time', '<', $lastTerm)//今年下学期的作业
            ->where('pub_time', '>', strtotime($time.'-'."02-01"))->get()->pluck('id');
        }
        if ($type_id == 1) {
            $work = Work::select('id')->where(['student_id' => $user->id])->whereIn('job_id', $jobs)->get();//查询出这个学生所有的作业work_id;
        }else{
            $work = Work::select('id')->where(['student_id' => $user->id])->orderBy('id', 'desc')
            ->whereIn('job_id', $jobs)->first(); //查询出这个学生所有的作业work_id;
        }
        if (empty($work)) {//该学生还没有作业
            $data = [];
        }else{
            $baseNum = (int)($user->id/1000-0.0001)+1;
            $db_name = 'mysql_stu_work_info_'.$baseNum;
            try{
                $db = DB::connection($db_name);
            }catch(\Exception $e){
                return $e;
            }
            $workInfo = $db->table($user->id)->whereIn('work_id', $work)->get()->pluck(['exe_id']);//查询所有的作业
            $exerciseChapter = Exercises::whereIn('id',$workInfo)->pluck('chapter_id')->unique();//要是有同样的chapter_id 则只显示一个
            $minutiaList = Chapter::where('course_id',$course)->whereIn('id',$exerciseChapter)->get()->toArray();//查询出小节的父id 
            $minutia_parentId = array_column($minutiaList, 'parent_id');//所有作业的parent_id
            $chapter = Chapter::where('course_id',$course)->whereIn('id',$minutia_parentId)->get();//查询出大章节信息

            foreach ($chapter as $key => $item) {
                $data[$key]['id'] = $item->id;//大章节的id
                $data[$key]['title'] = $item->title;
                $data[$key]['minutia'] = [];
                $data[$key]['count'] = 0;
                $data[$key]['exeCount'] = 0;
                foreach ($minutiaList as  $k => $minutia) {
                    $minutiaPat = Chapter::find($minutia['id'])->parent_id;
                    if ($minutiaPat == $item->id ) {
                       $exercise = Exercises::select('id')->where('chapter_id', $minutia['id'])->get()->pluck('id')->toArray();
                        $data[$key]['minutia'][$k]['count'] = count($exercise);
                        $data[$key]['minutia'][$k]['exeCount'] = count(array_intersect($exercise,$db->table($user->id)->select('exe_id')->where('work_id', NULL)->get()->pluck('exe_id')->toArray()));
                        $data[$key]['minutia'][$k]['id'] = $minutia['id'];
                        $data[$key]['minutia'][$k]['title'] = $minutia['title'];
                        $data[$key]['count'] +=  $data[$key]['minutia'][$k]['count'];
                        $data[$key]['exeCount'] +=  $data[$key]['minutia'][$k]['exeCount'];
                    }
                }
            }
        }
        return view('student.exerciseBase.review_list',compact('data', 'courseFirst', 'type_id', 'func', 'user', 'courseAll'));
    }
    //习题册 学生的预习
    public function foreExercise($course, $type_id) {
        $func = "";
        $user = Auth::user(); //查看当前老师 
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $class =  Classes::where('id',$user->class_id)->first()->parent_id;
        $schoolType = School::where('id',$user->school_id)->first()->type;
        $gradeTitle = Classes::where('id', $class)->first()->title;
        $time = date("Y", time());
        $lastTerm = strtotime($time.'-'."08-01");//获取上学期的时间
        $semesterTime = time(); // 现在的时间戳
        $nextTerm = strtotime(($time+1).'-'."02-01");//获取下学期的时间
        $half = $semesterTime < $lastTerm ? '年级下' : '年级上';
        $grade = $time - $gradeTitle + 1;
        $grade = $grade * 2 - ($half === '年级上' ? 1 : 2);
        //1 代表小学 2 代表初中 3 代表大学
        if ($schoolType == 1) {
            switch ($grade) {
                case 1:
                    $grade = "一";
                    break;
                case 2:
                    $grade = "二";
                    break;
                case 3:
                    $grade = "三";
                    break;
                case 4:
                    $grade = "四";
                    break;
                case 5:
                    $grade = "五";
                    break;
                case 6:
                    $grade = "六";
                    break;
            }
        } elseif ($schoolType == 2) {
            switch ($grade) {
                case 1:
                    $grade = "七";
                    break;
                case 2:
                    $grade = "八";
                    break;
                case 3:
                    $grade = "九";
                    break;
                }
        }
        $grade .= $half;
        $jobs = Job::select('id')->where('course_id', $course);
        if (time() > $lastTerm){
           $jobs->where('pub_time', '>', $lastTerm)->where('pub_time', '<', $nextTerm);//今年上学期的作业
        }else{
            $jobs->where('pub_time', '<', $lastTerm)->where('pub_time', '>', strtotime($time.'-'."02-01"));//今年下学期的作业
        }
        $jobs = $jobs->get()->toArray();
        //如果为空的话说明这个学期还没有布置作业
        $data = [];
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        if (!empty($jobs)) {
            $work = Work::select('id')->where(['student_id' => $user->id])->whereIn('job_id', $jobs)->get();
            $workInfo = $db->table($user->id)->whereIn('work_id', $work)->get()->pluck(['exe_id']);//查询所有的作业
            $exerciseChapter = Exercises::whereIn('id',$workInfo)->pluck('chapter_id')->unique();//除了学过的小节id
        }
        $grade_id = Chapter::where(['title' => $grade])->first()->id;     
        $chapterAll = Chapter::where(['parent_id' => $grade_id, 'course_id' => $course])->get();//所有大章节的Id
        foreach($chapterAll as $key => $chapter){
            $minutia = Chapter::where('parent_id', $chapter->id);
            if (!empty($jobs)) {
                $minutia = $minutia->whereNotIn('id', $exerciseChapter);
            }
            $minutiaAll = $minutia->get()->toArray();
            $data[$key]['id'] = $chapter->id;
            $data[$key]['title'] = $chapter->title;
            $data[$key]['minutia'] = [];
            $data[$key]['count'] = 0;
            $data[$key]['exeCount'] = 0;    
            foreach($minutiaAll as  $k => $minutia){
                $exercise = Exercises::select('id')->where('chapter_id', $minutia['id'])->get()->pluck('id')->toArray();
                $data[$key]['minutia'][$k]['count'] = count($exercise);
                $data[$key]['minutia'][$k]['exeCount'] = count(array_intersect($exercise,$db->table($user->id)->select('exe_id')->where('work_id', NULL)->get()->pluck('exe_id')->toArray()));
                $data[$key]['minutia'][$k]['id'] = $minutia['id'];
                $data[$key]['minutia'][$k]['title'] = $minutia['title'];
                $data[$key]['count'] +=  $data[$key]['minutia'][$k]['count'];
                $data[$key]['exeCount'] +=  $data[$key]['minutia'][$k]['exeCount'];
            }
        }
        return view("student.exerciseBase.review_list",compact('data', 'courseFirst', 'type_id', 'user', 'courseAll', 'func'));
    }
    //先查询所有这位学生的作业错题本
    public function errorsExercise($course, $type_id) {
        $func = "";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $user = Auth::user();
        $data = [];
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        $exeInfo = $db->table($user->id)->select('exe_id', 'score')->where('status', 2)->get();//查询所有的错题
        foreach ($exeInfo as $exe) {
            $exerciseScore = Exercises::find($exe->exe_id)->score;
            if ($exe->score < $exerciseScore) {
                $exe_id[] = $exe->exe_id;
            }
        }
        $exerciseChapter = Exercises::whereIn('id',$exe_id)->pluck('chapter_id')->unique();
        $minutiaList = Chapter::where('course_id',$course)->whereIn('id',$exerciseChapter)->get()->toArray();//查询出小节的父id 
        $minutia_parentId= array_column($minutiaList, 'parent_id');//所有作业的parent_id
        $chapter = Chapter::where('course_id',$course)->whereIn('id',$minutia_parentId)->get();//查询出大章节信息
        foreach ($chapter as $key => $item) {
            $data[$key]['id'] = $item->id;
            $data[$key]['title'] = $item->title;
            $data[$key]['minutia'] = [];
            $data[$key]['count'] = 0;
            $data[$key]['exeCount'] = 0;    
            foreach ($minutiaList as  $k => $minutia) {
                $minutiaPat = Chapter::find($minutia['id'])->parent_id;
                if ($minutiaPat == $item->id) {
                     $data[$key]['minutia'][$k]['exeCount'] = 0;
                    $data[$key]['minutia'][$k]['id'] = $minutia['id'];
                    $data[$key]['minutia'][$k]['title'] = $minutia['title'];
                }
            }
        }
        return view('student.exerciseBase.review_list',compact('data', 'courseFirst', 'type_id', 'user', 'courseAll', 'func'));
    }
    //这个学生某个章节错了多少题
    public function chapterErrorExercise($type_id, $course, $chapter, $several = NULL) {
        $data = [];
        $exe_id = [];
        $func = "";
        $abcList = range("A","Z");
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
        if ($type_id == 3) {
            $exeInfo = $db->table($user->id)->select('exe_id', 'score')->where('status', 2)->get();//查询所有的错题
            foreach ($exeInfo as $exe) {
                $exerciseScore = Exercises::find($exe->exe_id)->score;
                if ($exe->score < $exerciseScore) {
                    $exe_id[] = $exe->exe_id;
                }
            }
        }else{
            $exe_id = $db->table($user->id)->where(['work_id' => NULL])->select('exe_id', 'score')->get()->pluck('exe_id');//查询所有的错题
        }
        if (!empty($several)) {
            $chapter = Chapter::select('id')->where('parent_id',$chapter)->get()->pluck('id')->toArray();
            $exercisesChapter = Exercises::select('chapter_id')->whereIn('id',$exe_id)->get()->pluck('chapter_id')->toArray();
            $chapter_id = array_intersect($chapter,$exercisesChapter);
            $chapterExercises = Exercises::select('id', 'exe_type', 'categroy_id', 'chapter_id')->whereIn('chapter_id',$chapter_id)->whereIn('id',$exe_id)->get();
        }else{
            $chapterExercises = Exercises::select('id', 'exe_type', 'categroy_id', 'chapter_id')->where('chapter_id',$chapter)->whereIn('id',$exe_id)->get();
        }
        foreach($chapterExercises as $exercise) {
            $categroy_id = Category::find($exercise->categroy_id)->id;
            $categroy_title = Category::find($exercise->categroy_id)->title;
            if ($exercise->exe_type == Exercises::TYPE_OBJECTIVE) {
                $objective = Objective::where('exe_id',$exercise->id)->first();
                $exercisesSort = $db->table($user->id)->select('sort')->where('exe_id',$exercise->id)->first();//查询这个学生的单个的错题
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
        $work_answer = json_decode($errorExercise->answer,true);//自己答题情况
        if ($errorReports->exe_type == Exercises::TYPE_OBJECTIVE) {
            $objective = Objective::where('exe_id', $exe_id)->first();
            $option = [];
            if (!empty($errorExercise->sort)) {
                foreach(json_decode($errorExercise->sort) as $sort){
                    array_push($option,json_decode($objective->option,true)[$sort-1]);
                }
            }
            $answer_list = json_decode($objective->answer, true);//标准答案的记录
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
        }else if ($errorReports->exe_type == Exercises::TYPE_SUBJECTIVE) {
            //显示每个主观题的内容
            $subjective = Subjective::where('exe_id',$errorReports->id)->first();
            array_push($data, array(
                'id' => $errorReports->id,
                'categroy_id' => $errorReports->categroy_id,
                'subject' => $subjective->subject,
                'wrokAnswer' => $work_answer['answer'],
                'score' => $errorExercise->score/100,
                'second' => $errorExercise->second,
                'totalScore' => $errorReports->score/100,
                'postil' => json_decode($errorExercise->correct),
            ));
        }
        return view('student.exerciseBase.wrongNotebook_showAnalysis', compact('data', 'abcList', 'user', 'func', 'courseAll', 'courseFirst', 'type_id'));
    }

    public function correctExercise($exe_id){
        $user = Auth::user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        $exerciseUpdate = $db->table($user->id)->where(['exe_id' => $exe_id, 'score' => 0])->update(['type' => 3]);
    }
    //学生复习，预习，同步练习，错题本做的作业页面 状态码3代表错题本
    public function practice($course, $chapter_id, $type_id, $several = NULL){
        $data =[];
        $user = Auth::user();
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        //查询已经做过的题
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            if($type_id == 4){
                $this->createBase($baseNum);
                $db = DB::connection($db_name);
            }
        }
        if ($type_id != 3) {//查询出随机的1道题的内容//复习、同类型习题、预习
            $didExercise = $db->table($user->id)->select('exe_id')->get()->pluck('exe_id')->toArray();
            if (!empty($several)) {
                $chapter = Chapter::select('id')->where('parent_id',$chapter_id)->get()->pluck('id')->toArray();
                    $exercisesChapter = Exercises::select('chapter_id')->whereIn('id',$didExercise)->get()->pluck('chapter_id')->toArray();
                    if($type_id != 4) {
                        $chapter_id = array_intersect($chapter,$exercisesChapter);
                    }else{
                        $chapter_id = array_diff($exercisesChapter,$chapter);
                    }
                    $chapterExercises = Exercises::where( 'exe_type', 1)->whereIn('chapter_id', $chapter_id)
                    ->whereNotIn('id', $didExercise)->inRandomOrder()->first();
            }else{
                $chapterExercises = Exercises::where(['chapter_id' => $chapter_id,  'exe_type' => 1])
                ->whereNotIn('id', $didExercise)->inRandomOrder()->first();
            }
        }else{
            $errorsExeId = $db->table($user->id)->where('score', 0)->where('type', '<>', 3)->get()->pluck('exe_id');//查询这个学生的所有的错题
            $chapterExercises = Exercises::select('id', 'exe_type', 'categroy_id', 'chapter_id')
            ->where(['chapter_id' => $chapter_id, 'exe_type' => 1])->whereIn('id',$errorsExeId)->inRandomOrder()->first();
        }
        if(!empty($chapterExercises)) {
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
        }
        return view('student.exerciseBase.foreExercise_content', compact('data', 'course', 'abcList' , 'user', 'courseAll', 'courseFirst', 'type_id'));
    }
    //复习和同类型练习预习都添加到work_info表里,work_id为空
    public function addWorkExercise(){
        $user = Auth::user();
        $input = Input::get();
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
        $result = $db->table($user->id)->insert(['type' => NULL, 'exe_id' => $input['exe_id'],
            'answer' => empty($input['student_answer']) ? json_encode(array('answer' => []), JSON_UNESCAPED_UNICODE) : json_encode(array('answer' => $input['student_answer']), JSON_UNESCAPED_UNICODE),'second' => $input['second'], 'score' => $input['score'], 'sort' => isset($input['sort']) ? json_encode($input['sort'], JSON_UNESCAPED_UNICODE) : NULL]);
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
