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
use App\Models\Categroy;
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
    public function showWorkList($page = 1){
        $limit = ($page-1)*10;
        $user = Auth::guard('student')->user();
        $work_all = Work::where('student_id',$user->id)->get();
        $pageLength = intval($work_all->count()/10)+1;
        $work_list = Work::where('student_id',$user->id)->skip($limit)->take(10)->get();
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
        $exercise_id = explode(',',$work->belongsToJob()->first()->exercise_id);
        $data = array();
        foreach ($exercise_id as $eid) {
            $exercise = Exercises::find($eid);
            $cate_title = Categroy::find($exercise->categroy_id)->title;
            if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
                $subjective = Subjective::where('exe_id',$exercise->id)->first();
                array_push($data,array(
                    'id' => $exercise->id,
                    'cate_title' => $cate_title,
                    'subject' => $subjective->subject,
                    'score' => $exercise->score/100
                    ));
            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $objective = Objective::where('exe_id',$exercise->id)->first();
                array_push($data,array(
                    'id' => $exercise->id,
                    'cate_title' => $cate_title,
                    'subject' => $objective->subject,
                    'options' => json_decode($objective->option),
                    'score' => $exercise->score/100
                    ));
                
            }
        }
        return json_encode($data);
    }
    public function subWork(){
        $input = Input::get();
        $user = Auth::guard('student')->user();
        $work = Work::find(intval($input['work_id']));
        $data = $input['data'];
        $work->answer = json_encode($data['data']);
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
                $table->text('answer');
                $table->integer('start_time')->nullable();
                $table->integer('end_time')->nullable();
                $table->smallInteger('score')->nullable();
                $table->string('comment',200)->nullable();
            });
        }
        foreach ($data as $exe_id => $answer) {
            $exercise = Exercises::find($exe_id);
            if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
                $db->table($user->id)->insert(['work_id' => $work->id,'exe_id' => $exe_id,'answer' => $answer]);
            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $objective = $exercise->hasManyObjective();
                $flag = true;
                $standard = explode(',',$objective->answer);
                $answer_arr = explode(',',$answer);
                foreach ($standard as $key => $value) {
                    if($value != $answer_arr[$key]){
                        $flag = false;
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
    }

    public function showScore($work_id){
        $data = array();
        $user = Auth::guard('student')->user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        $info_list = $db->table($user->id)->where('work_id',$work_id)->get();
        foreach ($info_list as $info) {
            $data['score'] += $info['score'];
            $exercise = Exercises::find($info['exe_id']);
            if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $data['objective_score'] += $info['score'];
                switch($exercise->categroy_id){
                    case Exercises::CATE_RADIO : $data['objective_radio_score'] += $info['score'];
                    break;
                    case Exercises::CATE_CHOOSE : $data['objective_choose_score'] += $info['score'];
                    break;
                    case Exercises::CATE_LINE : $data['objective_line_score'] += $info['score'];
                    break;
                    case Exercises::CATE_SORT : $data['objective_sort_score'] += $info['score'];
                    break;
                    case Exercises::CATE_JUDGE : $data['objective_judge_score'] += $info['score'];
                    break;
                    case Exercises::CATE_FILL : $data['objective_fill_score'] += $info['score'];
                    break;
                }
            }else if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
                $data['subjective_score'] += $info['score'];
            }
        }
        return json_encode($data);
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
        $exercise_id = explode(',',$work->belongsToJob()->first()->exercise_id);
        $data = array();
        foreach ($exercise_id as $eid) {
            $exercise = Exercises::find($eid);
            $cate_title = Categroy::find($exercise->categroy_id)->title;
            if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $objective = Objective::where('exe_id',$exercise->id)->first();
                $answers = array();
                if($exercise->categroy_id == Exercises::CATE_CHOOSE || $exercise->categroy_id == Exercises::CATE_RADIO){
                    $answer_list = explode(',',$objective->answer);
                    foreach ($answer_list as $key => $answer) {
                        array_push($answers,array_keys(json_decode($objective->option,true)[(int)$answer-1])[0]);
                    }
                }else{
                    array_push($answers,explode(',',$objective->answer));
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