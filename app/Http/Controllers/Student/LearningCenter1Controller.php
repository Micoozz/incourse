<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Input;
use Schema;
use Hash;
use Session;
use Redirect;
use App\Models\Job;
use App\Models\Work;
use App\Models\Course;
use App\Models\Exercises;
use App\Models\Objective;
use App\Models\Category;
use App\Models\Subjective;
use App\Models\Student;
use App\Models\Region;
use App\Models\Chapter;
use App\Models\Classes;
use App\Models\School;

class LearningCenterController extends Controller
{
    //页面板块
    const MOD_HOMEWORK = 1 ;
    //功能板块
    const FUNC_STUDENT_PWD = 'student-pwd';
    const FUNC_STUDENT_NAME = 'student-name';
    const FUNC_EXERCISE_BOOK = 1;
    const FUNC_ROUTINE_WORK = 2;
    const FUNC_WORK_SCORE = 3;
    const FUNC_ERROR_REPORTS = 4;
    const FUNC_ANSWER_SHEET = 5;
    const FUNC_WORK_TUTORSHIP = 6;//分数提升

    //该学生填写自己所在班级
    public function studentClass(){
        $class_id = Auth::guard('student')->user()->class_id;
        $class = Classes::where('id',$class_id)->get();
        return view();
    }
    //学生添加他的班级
    public function selectClass($class){
        $user = Auth::guard('student')->user();
        $student_class = Student::where('id',$user->id)->first();
        $student_class->class = $class;
        $student_class->save();
    }

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
    //单独查看今天有多少作业
    public function todayWork(){
        $user = Auth::guard('student')->user();
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => 1])->get()->toArray();//查询第一次进入是在哪个科目
           //判断是否是今天的作业，数据库和当前时间时间戳进行对比
        $date = strtotime(date('Ymd'));
        $job_list = array_column(Job::where('pub_time','>',$date)->where('deadline','<',$date)->get(['id'])->toArray(),'id');//大于当前时间且小于截至时间的id
        $data = Work::where(['student_id' => $user->id])->whereIn('job_id',$job_list)->paginate(5);//显示今天所有的作业
        $count = count($data);//作业数量
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        //判断这个学生有没有做过作业,有做过作业显示引导页,这里要是没有学生写作业怎么办就会报错
       /* $work_id = array_column(Work::where(['student_id' => $user->id,])->get()->toarray(), 'id');
        $workCount = $db->table($user->id)->select('work_id')->whereIn('work_id',$work_id)->get()->toArray();*/

        foreach($data as $work){
            $minutia = Chapter::find($work->chapter_id);
            $chapter = Chapter::where('id',$minutia->parent_id)->get(['title']);
            $work->title = $work->belongsToJob()->first()->title;
            $work->pub_time = $work->belongsToJob()->first()->pub_time;
            $work->deadline = $work->belongsToJob()->first()->deadline;
            $work->job_type = $work->belongsToJob()->first()->job_type;
            $info_list = $db->table($user->id)->where('work_id',$work->id)->get();
            foreach($info_list as $info){
                $work->score += isset($data['score']) ? $data['score'] + $info->score/100 : 0 + $info->score/100;
            }
        }
        return view(,compact('courseAll','courseFirst','data','count'));
    }
    //今日作业的详细内容
    public function routineWork($parameter){
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => 1])->get()->toArray();//查询第一次进入是在哪个科目
        $work = Work::select('chapter_id','sub_time')->find($parameter);
        $minutia = Chapter::find($work->chapter_id);
        $chapter = Chapter::where('id',$minutia->parent_id)->get(['title']);
        $data['sub_time'] = $work->sub_time;
        $data['work'] = Work::find($parameter)->belongsToJob()->first();
        $data['count'] = count(explode(',', $data['work']->exercise_id));
        return view(,compact('data','minutia','chapter','courseAll','courseFirst'));
    }
    //学习中心的学生作业
   public function learningCenter($course = null){
        $data = Work::where(['student_id' => $user->id,'course_id' => $course])->paginate(5);
        foreach ($data as $work) {
            $minutia = Chapter::find($work->chapter_id);
            $chapter = Chapter::where('id',$minutia->parent_id)->get(['title']);
            $work->title = $work->belongsToJob()->first()->title;
            $work->pub_time = $work->belongsToJob()->first()->pub_time;
            $work->deadline = $work->belongsToJob()->first()->deadline;
            $work->job_type = $work->belongsToJob()->first()->job_type;
            $info_list = $db->table($user->id)->where('work_id',$work->id)->get();
            foreach($info_list as $info){
                $work->score += isset($data['score']) ? $data['score'] + $info->score/100 : 0 + $info->score/100;
            }
        }
   }

    //作业分数显示及作业信息
    public function workScore($parameter){
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => 1])->get()->toArray();//查询第一次进入是在哪个科目
        $work = Work::select('chapter_id','sub_time')->find($parameter);
        $minutia =  Chapter::find($work->chapter_id);
        $chapter = Chapter::where('id',$minutia->parent_id)->get(['title']);
        $correctScore = "";; //正确题的分数
        $errorScore = ""; //错误题的分数
        $exercise_id = explode(',',$data['work']->exercise_id);//有两种判断方法 一种判断分数有没有值，第二种答案对比
        $data['objectiveCount'] = 0;
        $data['objectiveErrorCount'] = 0;
        $data['modifyCount'] = 0;
        foreach($exercise_id as $exe_id){
            $exercise = Exercises::find($exe_id);
            $work_answer = $db->table($user->id)->where(['work_id' => $parameter,'exe_id' => $exe_id])->first()->answer;
            $work_answer = json_decode($work_answer,true)['answer'];

            //客观题的正确率
            if ($exercise->exe_type ==Exercises::TYPE_OBJECTIVE) {
                $objective_answer = Objective::where('exe_id',$exercise->id)->first()->answer;//客观题的答案
                $objective_answer = json_decode($objective_answer,true)['answer'];
                if ($work_answer == $objective_answer) {
                    $data['objectiveCount'] = $data['objectiveCount'] + 1; //正确多少道题
                    array_push($data['status'],array(
                        'id' => 1,
                        'exe_id' => $exe_id,
                    ));
                    $correctScore += $exercise->score / 100;  //正确题的分数
                }else{
                    $data['objectiveErrorCount'] = $data['objectiveErrorCount'] + 1; //错误多少道题
                    array_push($data['status'],array(
                        'id' => 2,
                        'exe_id' =>$exe_id,
                    ));
                    $tutorship[] = $exe_id;//做错题，传同类型习题
                    $errorScore += $exercise->score / 100; //错误题的分数
                }
            }else if ($exercise->exe_type ==Exercises::TYPE_SUBJECTIVE) {
                $data['modifyCount'] = $data['modifyCount'] + 1;//主观题有多少道
                array_push($data['status'],array(
                    'id' => 3,
                    'exe_id' =>$exe_id,
                ));
            }
        }
        $tutorship = implode('&',$tutorship); //所有的错题ID
        $totalScore = $correctScore+$errorScore+0; //主观题先设为0
        $data['accuracy'] = $correctScore / $totalScore;//这里算分数率，
        if(is_int($data['accuracy'])){
            $data['accuracy'] = $data['accuracy'];
        }else{
            $data['accuracy'] = round($data['accuracy'],4);
        }
        return view(,compact('data','minutia','chapter','abcList','tutorship'))
    }

    public function errorReports($work_id){
        $abcList = ['A', 'B', 'C', 'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        if (empty($exercise_id)) {
            $work_answer = $db->table($user->id)->where(['work_id' => $parameter,'score' => 0 ])->first();
            $exercise_id = $work_answer->exe_id;
        }
        $work_answer = $db->table($user->id)->where(['work_id' => $parameter,'exe_id' => $exercise_id])->first();
        $errorReports = Exercises::find($exercise_id);
        $data = array('exercises' => array());
        $data['workCount'] = count($db->table($user->id)->where(['work_id' => $parameter])->get());
        $categroy_id = Category::find($errorReports->categroy_id)->id;
        $categroy_title = Category::find($errorReports->categroy_id)->title;
        if ($errorReports->exe_type == Exercises::TYPE_OBJECTIVE) {
            $objective = Objective::where('exe_id',$errorReports->id)->first();
            $answer_list = json_decode($objective->answer,true);     //标准答案的记录
            $work_answer = json_decode($work_answer->answer,true); //自己写的答案记录
            $answers = array();
            if ($errorReports->categroy_id == Exercises::CATE_CHOOSE || $errorReports->categroy_id == Exercises::CATE_RADIO) {
                $standard_answer = array();
                $user_answer = array();
                foreach ($answer_list as  $answer) {
                    array_push($standard_answer,empty($work_answer) ? '' : $answer_list);
                }
                foreach ($work_answer as  $value) {
                    array_push($user_answer,empty($work_answer) ? '' : $work_answer);
                }
                array_push($answers,array('standard' => $standard_answer,'user_answer' => $user_answer));
            }else{
                array_push($answers,array('standard' => $answer_list,'user_answer' => $work_answer));
            }
            array_push($data['exercises'],array(
            'id' => $errorReports->id,
            'categroy_id' => $categroy_id,
            'categroy_title' => $categroy_title,
            'subject' => $objective->subject,
            'options' => json_decode($objective->option,true),
            'answer' => $answers,
            'score' => $errorReports->score/100
            ));
        }else{
            dd("此处是主观题");
        }
        return view(,compact(''))        
    }

    public function homotypology($exercises_id){
        $exercise_id = explode('&', $exercises_id);
        $data = array();
        foreach($exercise_id as $eid){
            //dd($eid);
            $errorsExercise = Exercises::select('chapter_id','categroy_id')->find($eid);//找出这个题是哪个章节和题型
            $homotypology = Exercises::where(['chapter_id' => $errorsExercise->chapter_id,'categroy_id' => $errorsExercise->categroy_id])
            /*->where('id','<>',$eid)*/->take(3)->get();//查询出该错题的3道同类型习题
            //dd($homotypology);
            foreach ($homotypology as $exercise) {
                $categroy_id = Category::find($exercise->categroy_id)->id;
                $categroy_title = Category::find($exercise->categroy_id)->title;
                //dd($categroy_title);
                $abcList = ['A', 'B', 'C', 'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
                $objective = Objective::where('exe_id',$exercise->id)->first();
                $options = json_decode($objective->option,true);
                shuffle($options);
                array_push($data, array(
                    'id' => $exercise->id,
                    'categroy_id' => $categroy_id,
                    'categroy_title' => $categroy_title,
                    'subject' => $objective->subject,
                    'type' => 2,
                    'parent_id' => $eid,
                    'options' => $options,
                    'answer' => json_decode($objective->answer,true),
                    'score' => $exercise->score/100,
                ));
            }
        }
        return view('student.doHomework',compact('data','abcList'));
    }

    //同类型习题算分
    public function sameScore(){
        $input = Input::get();
        $user = Auth::guard('student')->user();
        $work = Work::find(intval($input['work_id']));
        $code = 200 ;
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\InvalidArgumentException $e){
            $this->createBase($baseNum);
            $db = DB::connection($db_name);
        }

        if(!Schema::connection($db_name)->hasTable($user->id)){
            Schema::connection($db_name)->create($user->id, function ($table) {
                $table->integer('work_id');
                $table->integer('exe_id');
                $table->text('answer')->nullable();
                $table->integer('second')->nullable();
                $table->smallInteger('score')->default(0);
                $table->string('comment',200)->nullable();
            });
        }
        foreach ($input['data'] as $answer) {
            $exercise = Exercises::find($answer['id']);
            $objective = $exercise->hasManyObjective()->first();
            $flag = true;
            $standard = json_decode($objective->answer,true);
            if(is_array($answer['answer'])){        
                $answer_arr = array("answer" => $answer['answer']);
            }else{
                $answer_arr = array("answer" => array($answer['answer']));
            }
            foreach ($standard as $key => $value) {
                if(!isset($answer_arr[$key]) || $value != $answer_arr[$key]){
                    $flag = false;
                    break;
                }
            }
            if($flag){
                $score = $exercise->score;
            }else{
                $score = 0;
            }
            $result = $db->table($user->id)->insert(['work_id' => $input['work_id'],'type' => 2,'exe_id' => $answer['id'],'answer' => json_encode($answer_arr,JSON_UNESCAPED_UNICODE),'second' => $answer['last'],'score' => $score]);
        }
    }
    //修改密码
    public function updatePwd(){
        $user = Auth::guard('student')->user();
        $input = Input::get();
        if (Session::get('milkcaptcha') != $input['data']['code']) { 
            $result = "201" ;
        }else {
            if (Hash::check($input['data']['pwd'], $user->password)) {
                $newPwd = Student::find($user->id);
                $newPwd->password = bcrypt($input['data']['newPwd']);
                $result = $newPwd->save();
            }else{
                $result = false;
            }   
        }
        return json_encode($result);
    }
    
    //习题册 复习
     public function review($course = 2){
        $user = Auth::guard('student')->user();
        $workChapter = Work::where(['student_id' => $user->id,'course_id' => $course ])->get(['chapter_id'])->toArray();//作业的小节
        $minutiaList = Chapter::where('course_id',$course)->whereIn('id',$workChapter)->get()->toArray();//查询出小节的父id
        //查询这个学生所有的作业id
        $minutia_parentId = array_column($minutiaList, 'parent_id');//所有作业的parent_id
        $chapter = Chapter::where('course_id',$course)->whereIn('id',$minutia_parentId)->get();//查询出大章节信息
        $data = array();
        foreach ($chapter as $key => $item) {
            $data[$key]['id'] = $item->id;
            $data[$key]['title'] = $item->title;
            $data[$key]['minutia'] = array();
            foreach ($minutiaList as  $k => $minutia) {
                $minutiaPat = Chapter::find($minutia->id)->parent_id; 
                if ($minutiaPat == $item->id ) {
                    $data[$key]['minutia'][$k]['id'] = $minutia->id;
                    $data[$key]['minutia'][$k]['title'] = $item->title;
                }
            }
        }
        return json_encode($data);
    }
    //同步练习
    public function syncExercise($course = 2){
        $user = Auth::guard('student')->user();
        $minutia = Work::where(['student_id' => $user->id,'course_id' => $course])->first();//查询老师最新布置的作业
        $chapter = Chapter::where(['id' => $minutia->chapter_id,'course_id' =>$course])->first();//查询出该小节的大章节
        $data =array('id' => $chapter->id,'title' => $chapter->title,'minutia' => array('id' => $minutia->id,'title' => $minutia->title));
        return json_encode($data);
    }
    //预习
    public function foreExercise($course = 2){
        $user = Auth::guard('student')->user();
        $minutia_id = Work::where(['student_id' => $user->id,'course_id' => $course])->get()->pluck('Chapter_id');//查询出所有作业
        $minutia_parentId = Chapter::where('course_id',$course)->whereIn('id',$minutia_id)->get()->pluck('parent_id');//查询出小节的父id
        $chapter = Chapter::where('course_id',$course)->whereNotIn('id',$minutia_parentId)->get()->toArray();//查询出除了复习的所有大章节
        return json_encode($chapter);
    }
    //先查询所有这位学生的作业错题本
    public function errorsExercise($course = 2){
        $data = array();
        $user = Auth::guard('student')->user();
        $work_id = Work::where(['student_id' => $user->id,'course_id' => $course])->pluck('id');//查询出这个学生的所有作业
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        //查询出所有的这个学生错误的exe_id 题型id，
        $resutl = $db->table($user->id)->select('exe_id')->whereIn('work_id',$work_id)->where(['score' => 0])->get();

        //通过循环把日期最早的错题归结在那个作业下
        foreach($result as $work){
            $workTitle = $work->belongsToJob()->first()->title;//查出这次作业的名称，老师名字老师自取
            $point = Exercises::where('id',$work->exe_id)->first()->chapter_id;//找到这个作业题型的在哪个知识点下
            $minutia = Chapter::where('id',$point)->first();//获取这个小节的知识点
            $chapter = Chapter::where('id',$minutia->parent_id)->first();//获取这个知识点的大章节
            array_push($data, array(
                "chapter" => $chapter->title,
                "chapter_id" => $chapter->id,
                "minutia" = array("minutia" => $minutia->title,"id" => $minutia->id,"title" =array("workTitle" => $workTitle,"exe_id" => $work->exe_id))
            ));
        }
        return json_decode($data);
    }
}