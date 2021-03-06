<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Input;
use Auth;
use DB;
use Schema;
use App\Models\Job;
use App\Models\Work;
use App\Models\Exercises;
use App\Models\Objective;
use App\Models\Subjective;
use App\Models\Compositive;
use App\Models\Category;
use App\Models\Course;

class WorkController extends Controller
{
    //
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
    public function showWorkList($course = 1,$page = 1){
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        $limit = ($page-1)*10;
        $user = Auth::guard('student')->user();
        $work_all = Work::where(['student_id' => $user->id,'course_id' => $course])->get();
        $pageLength = intval($work_all->count()/10)+1;
        $work_list = Work::where(['student_id' => $user->id,'course_id' => $course])->skip($limit)->take(10)->get();
        $data = array('total' => $work_all->count(),'pageLength' => $pageLength,'works' => array());
        foreach ($work_list as $work) {
            array_push($data['works'],array(
                'work_id' => $work->id,
                'title' => $work->belongsToJob()->first()->title,
                'pub_time' => $work->belongsToJob()->first()->pub_time,
                'deadline' => $work->belongsToJob()->first()->deadline,
                'type' => $work->belongsToJob()->first()->job_type,
                'start_time' => $work->start_time,
                'sub_time' => $work->sub_time,
                'score' => $work->score/100,
                'status' => $work->status == Work::STATUS_OPEN ? '开放' : $work->status == Work::STATUS_UNSUB ? '未提交' : '关闭'
                ));
        }
        return json_encode($data);
        /**
         * undocumented constant
         **/
        $user = Auth::guard('student')->user();
        $workList = Work::where(['student_id' => $user->id, 'course_id' => $course])->paginate(5);
        return view('student.zuoyenbeneirongliebiao',compact('workList'));

    }
    public function showWorkDetail($work_id){

        if(empty($work_id)){
            return;
        }
        $user = Auth::guard('student')->user();
        $work = Work::find($work_id);
        if(!$work || $work->student_id != $user->id){
            return;
        }
        $data = array();
        $exercise_id = explode(',',$work->belongsToJob()->first()->exercise_id);
        $data['course_all'] = Course::all();
        $data['course_first'] = Course::where(['id' => isset($course) ? $course : 1])->get()->toArray();
       
        foreach ($exercise_id as $eid) {
            $exercise = Exercises::find($eid);
            $cate_title = Category::find($exercise->categroy_id)->title;
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
                    'options' => json_decode($objective->option),
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
                    'options' => json_decode($objective->option),
                    'score' => $exercise->score/100,
                    'count' => $countFill
                    ));
                }
                 
            }
        }
        return view('student.zuoyeben-index', compact('data'));
    }

    public function subWork(){

        $input = Input::get();
        $user = Auth::guard('student')->user();
        $work = Work::find(intval($input['work_id']));
        $data = $input['data'];
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
        foreach ($data as $exe_id => $answer) {
            $exercise = Exercises::find($exe_id);
            if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
                $db->table($user->id)->insert(['work_id' => $work->id,'exe_id' => $exe_id,'answer' => $answer]);
            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $objective = $exercise->hasManyObjective()->first();
                $flag = true;
                $standard = explode(',',$objective->answer);
                $answer_arr = explode(',',$answer);
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
                $db->table($user->id)->insert(['work_id' => $work->id,'exe_id' => $exe_id,'answer' => $answer,'score' => $score]);
            }
        }
        return json_encode($code);
    }

    public function showScore($work_id){
        $data = array();
        $user = Auth::guard('student')->user();
        $user = Auth::guard('student')->user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        return ;
        $info_list = $db->table($user->id)->where('work_id',$work_id)->get();
        foreach ($info_list as $info) {
            $data['cate'] = '综合得分';
            $data['score'] = isset($data['score']) ? $data['score'] + $info->score/100 : 0 + $info->score/100;
            $exercise = Exercises::find($info->exe_id);
            $data['total'] = isset($data['total']) ? $data['total'] + $exercise->score/100 : 0 + $exercise->score/100;
            if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $data['objective']['cate'] = '客观题得分';
                $data['objective']['score'] = isset($data['objective']['score']) ? $data['objective']['score'] + $info->score/100 : 0 + $info->score/100;
                $data['objective']['total'] = isset($data['objective']['total']) ? $data['objective']['total'] + $exercise->score/100 : 0 + $exercise->score/100;
                
            }else if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
                $data['subjective']['cate'] = '主观题得分';
                $data['subjective']['score'] = isset($data['subjective']['score']) ? $data['subjective']['score'] + $info->score/100 : 0 + $info->score/100;
                $data['subjective']['total'] = isset($data['subjective']['total']) ? $data['subjective']['total'] + $exercise->score/100 : 0 + $exercise->score/100;
            }
        }
        return view('student.danrenzuoye-chengji');
        //dd($data);
        //return json_encode($data);
    }
    public function showWorkObjectiveDetail($work_id){
        if(empty($work_id)){
            return;
        }
        $user = Auth::guard('student')->user();
        $work = Work::find($work_id);
        if(!$work || $work->student_id != $user->id){
            return;
        }
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        $exercise_id = explode(',',$work->belongsToJob()->first()->exercise_id);
        $data = array('type' => 'objective');
        foreach ($exercise_id as $exe_id) {
            $work_info = $db->table($user->id)->where(['work_id' => $work_id,'exe_id' => $exe_id])->first();
            $exercise = Exercises::find($exe_id);
            $cate_title = Category::find($exercise->categroy_id)->title;
            if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $objective = Objective::where('exe_id',$exercise->id)->first();
                $answers = array();
                $answer_list = explode(',',$objective->answer);
                $user_answer_list = explode(',',$work_info->answer);
                if($exercise->categroy_id == Exercises::CATE_CHOOSE || $exercise->categroy_id == Exercises::CATE_RADIO){
                    foreach ($answer_list as $key => $answer) {
                        array_push($answers,array('standard' => array_keys(json_decode($objective->option,true)[(int)$answer-1])[0],
                            'user_answer' => empty($user_answer_list[$key]) ? '' : array_keys(json_decode($objective->option,true)[(int)$user_answer_list[$key]-1])[0])
                        );
                    }
                }else{
                    array_push($answers,array('standard' => $answer_list,'user_answer' => $user_answer_list));
                }
                array_push($data,array(
                    'id' => $exercise->id,
                    'cate_title' => $cate_title,
                    'subject' => $objective->subject,
                    'options' => json_decode($objective->option),
                    'answer' => $answers,
                    'score' => $exercise->score/100
                ));
            }
        }
        return json_encode($data);
    }
}