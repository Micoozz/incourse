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
use App\Models\Categroy;
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
    public function todayWork($func = 1, $parameter = null){
    	$user = Auth::guard('student')->user();
    	$courseAll = Course::all();
        $courseFirst = Course::where(['id' => isset($course) ? $course : 1])->get()->toArray();
         //判断是否是今天的作业，数据库和当前时间时间戳进行对比
        $date = strtotime(date('Ymd'));
        $job_list = array_column(Job::where('pub_time','>',$date)->where('deadline','<',$date)->get(['id'])->toArray(),'id');
	    $data = Work::where(['student_id' => $user->id])->whereIn('job_id',$job_list)->paginate(5);
	    $count = count($data);
		$baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        //判断这个学生有没有做过作业 //有做过作业显示引导页
        $work_id = array_column($data->toarray()['data'], 'id');//这里要是没有学生写作业怎么办就会报错
       // dd()
        $workCount = $db->table($user->id)->select('work_id')->whereIn('work_id',$work_id)->get()->toArray();
        //dd($workCount);
        
        if ($func == Self::FUNC_STUDENT_NAME){
        	$provinces = Region::where('type',1)->get();
        }elseif ($func == Self::FUNC_EXERCISE_BOOK) {
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
		}elseif ($func == Self::FUNC_ROUTINE_WORK){
			$chapter_id = Work::find($parameter)->chapter_id;
			$minutia =  Chapter::find($chapter_id);
			$chapter = Chapter::where('id',$minutia->parent_id)->get(['title']);

			$data['work'] = Work::find($parameter)->belongsToJob()->first();
			$data['count'] = count(explode(',',$data['work']->exercise_id));
		}
		return view('student.todayWork',compact('courseAll','courseFirst','data','count','func','parameter','user','minutia','chapter','workCount'));
    }
    //只显示所有的今日作业
    public function todayWork($func = "student-tadayWork"){
    	$user = Auth::guard('student')->user();
    }

}
