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
use App\Models\SensitiveWords;
class LearningCenterController extends Controller
{
	//页面板块
	const MOD_HOMEWORK = 'homework';
	//功能板块
	const FUNC_STUDENT_PWD = 'student-pwd';
	const FUNC_STUDENT_NAME = 'student-name';
	const FUNC_EXERCISE_BOOK = 'exercise_book';
	const FUNC_ROUTINE_WORK = 'routine_work';
	const FUNC_WORK_SCORE = 'work_score';
	const FUNC_ERROR_REPORTS = 'error_reports';
	const FUNC_ANSWER_SHEET = 'answer_sheet';
	const FUNC_WORK_TUTORSHIP = 'work_tutorship';//分数提升
	const FUNC_WORK_GROUP = 'work_group'; //小组详情
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
    public function todayWork($func = 'exercise_book', $parameter = null) {
    	$user = Auth::user();
    	//$courseAll = Course::all();//这里以后要区分年级的科目
    	$courseAll = Course::whereIn('id',[1,2,5])->get();
        $date = time();
        $job_list = array_column(Job::where('deadline', '>', $date)->get(['id'])->toArray(), 'id');
	    $data = Work::select('id', 'status', 'sub_time', 'start_time', 'job_id','course_id')->where(['student_id' => $user->id])->whereIn('job_id', $job_list)->orderBy('id', 'desc')->paginate(5);//显示所有的做作业
	    $count = count($data);
        if ($func == Self::FUNC_STUDENT_NAME){
        	$provinces = Region::where('type', 1)->get();
        }elseif ($func == Self::FUNC_EXERCISE_BOOK) {
        	$sameSecond = 0;
			foreach ($data as $work) {
				$job = $work->belongsToJob()->first();
				$work->count = count(json_decode($job->exercise_id));
	       		$work->title = $job->title;
		        $work->pub_time = $job->pub_time;
		        $work->deadline = $job->deadline;
		        $work->job_type = $job->job_type;
		        if ($work->status == 2 || $work->status == 3 || $work->status == 4) {
			    $baseNum = (int)($user->id/1000-0.0001)+1;	
		        $db_name = 'mysql_stu_work_info_'.$baseNum;
		        try{
		            $db = DB::connection($db_name);		
		        }catch(\Exception $e){
		            return $e;
		        }
	        	$info_list = $db->table($user->id)->select('score', 'parent_id', 'second')->where('work_id', $work->id)->get();
		        foreach($info_list as $info){
		       		if (!empty($info->parent_id)) {
		       			$sameSecond += $info->second;
		       		}
			        $work->score += isset($data['score']) ? $data['score'] + $info->score/100 : 0 + $info->score/100;
		    	}
			    	$second = $work->sub_time - $work->start_time + $sameSecond;
		    		$work->second = $this->changeTimeType($second);
		        }	
			}
		}elseif ($func == Self::FUNC_ROUTINE_WORK) {
			$data['work'] = Work::find($parameter)->belongsToJob()->first(['title', 'deadline', 'exercise_id', 'content', 'job_type']);
			$data['count'] = count(json_decode($data['work']->exercise_id));
		}
		return view('student.todayWork',compact('courseAll', 'data','count', 'func', 'parameter', 'user', 'workCount'));
    }
    public function learningCenter($course = 1, $mod = 'homework', $func = 'exercise_book', $parameter = null, $exercise_id = null, $several = 1){
    	$user = Auth::user();
    	$courseAll = Course::whereIn('id',[1,2,5])->get();
        $courseFirst = Course::where(['id' => $course])->get()->toArray(); 
        $data = array();
        $data['status'] = array();
        if($func != Self::FUNC_EXERCISE_BOOK || $func != Self::FUNC_ROUTINE_WORK){
	    	$baseNum = (int)($user->id/1000-0.0001)+1;
	        $db_name = 'mysql_stu_work_info_'.$baseNum;
	        try{
	            $db = DB::connection($db_name);
	        }catch(\Exception $e){
	            return $e;
	        }
	    }
        if ($mod == Self::MOD_HOMEWORK) {
 			if ($func == Self::FUNC_EXERCISE_BOOK) {
 				$sameSecond = 0;
		    	$data = Work::select('id', 'status', 'sub_time', 'start_time', 'job_id')->where(['student_id' => $user->id, 'course_id' => $course])->orderBy('id', 'desc')->paginate(5);
				foreach ($data as $work) {
					$job = $work->belongsToJob()->first();
					$work->count = count(json_decode($job->exercise_id));
		       		$work->title = $job->title;
			        $work->pub_time = $job->pub_time;
			        $work->deadline = $job->deadline;
			        $work->job_type = $job->job_type;
					if ($work->status == 2 || $work->status == 3 || $work->status == 4) {
						$baseNum = (int)($user->id/1000-0.0001)+1;
				        $db_name = 'mysql_stu_work_info_'.$baseNum;
				        try{
				            $db = DB::connection($db_name);
				        }catch(\Exception $e){
				            return $e;
				        }
			        	$info_list = $db->table($user->id)->select('score', 'parent_id', 'second')->where('work_id', $work->id)->get();
				        foreach($info_list as $info){
				       		if (!empty($info->parent_id)) {
				       			$sameSecond += $info->second;
				       		}
					        $work->score += isset($data['score']) ? $data['score'] + $info->score/100 : 0 + $info->score/100;
				    	}
				    	$second = $work->sub_time - $work->start_time + $sameSecond;
			    		$work->second = $this->changeTimeType($second);
			        }	
				}
		 	}else if ($func == Self::FUNC_ROUTINE_WORK ||  $func == Self::FUNC_WORK_SCORE) {
		 		$work = Work::select('sub_time', 'start_time','status')->find($parameter);
				$data['sub_time'] = $work->sub_time;
		 		$data['work'] = Work::find($parameter)->belongsToJob()->first(['title', 'deadline', 'exercise_id', 'content']);
				$data['count'] = count(json_decode($data['work']->exercise_id, true));
				if ($func == Self::FUNC_WORK_SCORE) {
					$exercise_id = json_decode($data['work']->exercise_id, true);//有两种判断方法 一种判断分数有没有值，第二种答案对比
					$correctScore = 0; //正确题的分数
					$totalScore = 0;
					$sameCorrectScore = 0;
					$data['objectiveCount'] = 0;
					$data['objectiveErrorCount'] = 0;
					$data['modifyCount'] = 0;
					$data['sameCount'] = 0;
					$data['sameErrorScore'] = 0;
					$data['sameExercise'] = array();
					foreach ($exercise_id as $exe_id) {
						$exercise = Exercises::find($exe_id);
						$totalScore += $exercise->score;
						$userWork = $db->table($user->id)->where(['work_id' => $parameter, 'exe_id' => $exe_id])->first();
						if ($exercise->exe_type == Exercises::TYPE_OBJECTIVE) {//客观题的正确率
							if ($exercise->score == $userWork->score) {
								$data['objectiveCount'] = $data['objectiveCount'] + 1;//正确多少道题
								array_push($data['status'], array(
									'id' => 1,
									'exe_id' => $exe_id,
								));
								$correctScore += $exercise->score;//正确题的分数
							}else{
								$data['objectiveErrorCount'] = $data['objectiveErrorCount'] + 1; //错误多少道题
								array_push($data['status'], array(
									'id' => 2,
									'exe_id' =>$exe_id,
								));
								$tutorship[] = $exe_id;//做错题，传同类型习题
							}
						}else if ($exercise->exe_type == Exercises::TYPE_SUBJECTIVE) {
							if($work->status == 2 || $work->status == 3) {
								$data['modifyCount'] = $data['modifyCount'] + 1;//主观题有多少道
								array_push($data['status'], array(
									'id' => 3,
									'exe_id' =>$exe_id,
								));
							}else if ($work->status == 4) {
								if ($userWork->score == $exercise->score) {
									$sameCorrectScore += $exercise->score;
									$data['objectiveCount'] = $data['objectiveCount'] + 1;//正确多少道题
									array_push($data['status'], array(
										'id' => 4,
										'exe_id' =>$exe_id,
									));
								}else{
									$sameCorrectScore += $userWork->score;
									$data['objectiveErrorCount'] = $data['objectiveErrorCount'] + 1; //错误多少道题
									array_push($data['status'], array(
										'id' => 5,
										'exe_id' =>$exe_id,
									));
								}
							}
						}
					}
					//同类型练习
					$same_list = $db->table($user->id)->where(['work_id' => $parameter])->where('parent_id', '<>', null)->get();
					foreach($same_list as $sameExercise){
						$objectiveScore = Exercises::find($sameExercise->exe_id)->score;
						if ($sameExercise->score == $objectiveScore) {
							$data['sameCount'] = $data['sameCount'] + 1;
							array_push($data['sameExercise'], array(
								'id' => 1,
								"exe_id" => $sameExercise->exe_id,
								"parent_id" =>$sameExercise->parent_id
							));
						}else{
							$data['sameErrorScore'] = $data['sameErrorScore'] + 1;
							array_push($data['sameExercise'], array(
								'id' => 2,
								"exe_id" => $sameExercise->exe_id,
								"parent_id" =>$sameExercise->parent_id
							));
						}
					}
					$second = $work->sub_time - $work->start_time;
					if (empty($same_list->toArray())) {
						$data['exeSecond'] = $this->changeTimeType($second);
						$tutorship = isset($tutorship) ? implode('&',$tutorship) : null;//所有的错题ID
						$accuracy = ($correctScore+$sameCorrectScore) / $totalScore;//这里算分数率
					}else{
						$sameSecond = 0;
						$grossScore = 0;
						$exeScore = 0;
						$grossExercise = $db->table($user->id)->select('score', 'second', 'parent_id')->where('work_id', $parameter)->get();
						//查询所有的作业以及同类型练习的信息
						foreach ($grossExercise as $exercise) {
							if (!empty($exercise->parent_id)) {
								$sameSecond += $exercise->second;
							}
							$grossScore += $exercise->score;
						}
						$exeSecond = $second + $sameSecond;
						$data['exeSecond'] = $this->changeTimeType($exeSecond);
				 		foreach ($exercise_id as $exe) {//作业的所有的分数
				 			$exeScore += Exercises::where('id', $exe)->first()->score; 
				 		}
				 		$accuracy = $grossScore / $exeScore;//总分数率
				 		$work = Work::find($parameter);
				 		$work->score = $grossScore;
				 		$work->save();
					}
				}
		 	}else if ($func == Self::FUNC_ERROR_REPORTS) {
		 		$abcList = range("A","Z");
		 		if ($exercise_id == 1) {
		 			$work_answer = $db->table($user->id)->where(['work_id' => $parameter, 'score' => 0 ])->where("parent_id", null)->first();
		 			$exercise_id = $work_answer->exe_id;
		 		}else if($exercise_id == 2){
		 			$errorExercise = "errorExercise";
		 			$work_answer = $db->table($user->id)->where(['work_id' => $parameter, 'score' => 0 ])->where("parent_id", "<>", null)->first();
		 			$exercise_id = $work_answer->exe_id;
		 		}
		 		$workFirst = $db->table($user->id)->where(['work_id' => $parameter,'exe_id' => $exercise_id])->first();
		 		$errorReports = Exercises::find($exercise_id);
		 		$data = array('exercises' => array());
		 		if($workFirst->parent_id == NULL){
		 			$data['workCount'] = count($db->table($user->id)->where(['work_id' => $parameter])->where("parent_id", null)->get());
		 		}else{
		 			$errorExercise = "errorExercise";
		 			$data['workCount'] = count($db->table($user->id)->where(['work_id' => $parameter])->where("parent_id", "<>", null)->get());
		 		}
		 		$categroy_id = Category::find($errorReports->categroy_id)->id;
		 		if ($errorReports->exe_type == Exercises::TYPE_OBJECTIVE) {	
		 			$objective = Objective::where('exe_id',$errorReports->id)->first();
		 			$option = array();	
		 			if (!empty($workFirst->sort)) {
			 			foreach(json_decode($workFirst->sort) as $sort){
			 				array_push($option,json_decode($objective->option,true)[$sort-1]);
			 			}
			 		}
		 			$answer_list = json_decode($objective->answer, true); //标准答案的记录
		            $work_answer = json_decode($workFirst->answer, true); //自己写的答案记录
		 			$answers = array();
		 			if ($errorReports->categroy_id == Exercises::CATE_CHOOSE || $errorReports->categroy_id == Exercises::CATE_RADIO) {
		 				$standard_answer = array();
	                	$user_answer = array();
	                    foreach ($answer_list as  $answer) {
	                    	array_push($standard_answer, empty($work_answer) ? '' : $answer_list);
	                    }
	                    foreach ($work_answer as  $value) {
		                    array_push($user_answer, empty($work_answer) ? '' : $work_answer);
		                }
		                array_push($answers,array('standard' => $standard_answer, 'user_answer' => $user_answer));
		 			}else{
		                array_push($answers,array('standard' => $answer_list, 'user_answer' => $work_answer));
		            }
		            array_push($data['exercises'], array(
                    'id' => $errorReports->id,
                    'categroy_id' => $categroy_id,
                    'subject' => $objective->subject,
                    'options' => $option,
                    'answer' => $answers,
                    'score' => $errorReports->score/100,
                    'second' => $workFirst->second,
                    'sameScore' => $workFirst->score/100,
                    ));
		 		}else if($errorReports->exe_type == Exercises::TYPE_SUBJECTIVE){

		 			$workStatus = Work::find($parameter)->status;
		 			if ($workStatus == 4) {
		 				$subjective = Subjective::where('exe_id',$errorReports->id)->first();
		 				$work_answer = json_decode($workFirst->answer,true); //自己写的答案记录
		 				array_push($data['exercises'], array(
		 					'id' => $errorReports->id,
		 					'categroy_id' => $categroy_id,
		 					'subject' => $subjective->subject,
		 					'answer' => $work_answer,
		 					'score' => $errorReports->score/100,
		 					'second' => $workFirst->second,
		 					'sameScore' => $workFirst->score/100,
		 					'postil' => json_decode($workFirst->correct),
		 				));
		 			}
		 		}
		 	}else if ($func == Self::FUNC_ANSWER_SHEET) {//错题卡
		 		$sameSkip = $exercise_id;
		 		$error_work = $db->table($user->id)->select('exe_id')->where(['work_id' => $parameter, 'score' => 0, 'status' => 2])->where('parent_id', null)->get()->toArray(); 
			   	$workStatus = Work::find($parameter)->status;
			    if($workStatus == 3){ 
			  		$subjectExercise = Exercises::select('id')->whereIn('id', $error_work)->where('exe_type',2)->get(); 
				   	$error_work = $db->table($user->id)->select('exe_id')->where(['work_id' => $parameter])->whereIn('exe_id',$subjectExercise)->get(); 
				} 
			   $error_same = $db->table($user->id)->select('exe_id', 'parent_id')->where(['work_id' => $parameter, 'score' => 0 ])->where('parent_id', '<>', null)->get()->toArray(); 
			   $data = array('error_work' => $error_work, 'error_same' => $error_same); 
		 	}else if ($func == Self::FUNC_WORK_TUTORSHIP) {//查询出同类型习题的
		 		$sameSkip = $several;
		 		$several = explode('&',$several);
		 		$startAccurary = $exercise_id; //起始值
		 		$work = Work::select('start_time', 'sub_time')->find($parameter);
		 		$second = $work->sub_time - $work->start_time;
		 		$grossScore = 0;
		 		$exeScore = 0;
		 		$exeSecond = 0;
		 		$SecondAdding = 0;	
		 		$sameExercise = $db->table($user->id)->select('score', 'exe_id', 'second')->where('work_id', $parameter)->where('parent_id', '<>', null)->get();
		 		//本次的同类型习题
		 		$grossExercise = $db->table($user->id)->select('score')->where('work_id', $parameter)->get();//查询所有的作业以及同类型练习的信息
		 		$exerciseCount =  $db->table($user->id)->select('exe_id')->where(['work_id' => $parameter])->where('parent_id', null)->get();//算出所有的作业的所有题
		 		foreach ($exerciseCount as $exe) {//作业的所有的分数
		 			$exeScore += Exercises::where('id', $exe->exe_id)->first()->score;
		 		}//查询所有的作业以及同类型练习加起来的分数
		 		foreach($grossExercise as $exercise){
		 			$grossScore += $exercise->score;
		 		}
		 		$accuracy = $grossScore / $exeScore;//总分数率
		 		$data = array();
		 		$sameErrorScore = 0;
				foreach($sameExercise as $exercise){
					if ($exercise->score == 0) {
						$sameErrorScore = $sameErrorScore + 1;
						array_push($data, array(
							"id" => 2,
							"exe_id" => $exercise->exe_id
						));
					}else {
						array_push($data, array(
							"id" => 1,
							"exe_id" => $exercise->exe_id
						));
					}
					$exeSecond += $db->table($user->id)->where(['work_id' => $parameter, 'exe_id' => $exercise->exe_id])->first()->second;
				}
				$SecondAdding = $second + $exeSecond;
				$entire = $this->changeTimeType($SecondAdding);
		 	}else if ($func == Self::FUNC_WORK_GROUP) {//小组作业详情
		 		
		 	}
        }
    	return view('student.learningCenter', compact('courseAll', 'courseFirst', 'data', 'mod', 'func', 'parameter', 'several', 'user', 'abcList', 'tutorship', 'accuracy', 'errorExercise', 'entire', 'exercise_id', 'sameSkip', 'errorScore', 'sameErrorScore','startAccurary'));
    }
    //做作业
    public function doHomework($work_id = NULL){
		$work = Work::find($work_id);
		if (empty($work->start_time)) {
			$work->start_time = time();
			$work->save();
		}
		$course = $work->course_id;
		$data = array();
		$exercises = json_decode($work->belongsToJob()->first()->exercise_id, true);
		foreach ($exercises as  $eid) {
			$exercise = Exercises::find($eid);
			$categroy_id = Category::find($exercise->categroy_id)->id;
			$categroy_title = Category::find($exercise->categroy_id)->title;
			if ($exercise->exe_type == Exercises::TYPE_SUBJECTIVE) {
				$subjective = Subjective::where('exe_id', $exercise->id)->first();
				array_push($data, array(
					'id' => $exercise->id,
					'categroy_id' => $categroy_id,
					'categroy_title' => $categroy_title,
					'subject' => $subjective->subject,
					'score' => $exercise->score/100,
				));
			}else if ($exercise->exe_type == Exercises::TYPE_OBJECTIVE) {
				$abcList = range("A","Z");
				$objective = Objective::where('exe_id', $exercise->id)->first();
				$options = json_decode($objective->option, true);
				if ($exercise->categroy_id == Exercises::CATE_FILL) {
					$objective->subject = preg_replace('/(?<=contenteditable\=\")false(?=\")/', 'true', $objective->subject);
				}
				shuffle($options);
			    array_push($data, array(
			    	'id' => $exercise->id,
			    	'categroy_id' => $categroy_id,
					'categroy_title' => $categroy_title,
					'subject' => $objective->subject,
					'options' => $options,
					'answer' => json_decode($objective->answer,true),
					'score' => $exercise->score/100,
			    ));
			}
		}
    	return view('student.doHomework',compact('data', 'work_id', 'course', 'abcList'));
    }
    //作业的分数
    public function homeworkScores(){
    	$input = Input::get();
    	$work_score = 0;
    	$user = Auth::user();
    	$work = Work::find(intval($input['work_id']));
    	if (!empty($work->sub_time) || $work->sub_time != 0) {
    		$code = 1;
    		return $code;
    	}
    	$code = 200 ;
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
                $table->integer('work_id')->nullable();
                $table->integer('exe_id')->nullable();
                $table->integer('parent_id')->nullable();
                $table->integer('type')->nullable();
                $table->text('answer')->nullable();
                $table->integer('second')->nullable();
                $table->smallInteger('score')->default(0);
                $table->string('comment',200)->nullable();
                $table->string('sort',200)->nullable();
                $table->integer('status')->nullable();
            });
    	}
        foreach ($input['data'] as $answer) {
        	$score = 0;
        	$exercise = Exercises::find($answer['id']);
        	if ($exercise->exe_type == Exercises::TYPE_SUBJECTIVE) {
        		$type = 1;
        		$result = $db->table($user->id)->insert(['work_id' => $input['work_id'], 'type' => 1, 'exe_id' => $answer['id'], 
        			'answer' => json_encode(array("answer" => $answer['answer']), JSON_UNESCAPED_UNICODE), 'second' => $answer['last'],
        			'score' => 0, 'status' => 1]);
        	}else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
        		$objective = $exercise->hasManyObjective()->first();
        		$flag = true;
        		$standard = json_decode($objective->answer, true);
        		if(is_array($answer['answer'])){
        			$answer_arr = array("answer" => $answer['answer']);
        		}else{
	        		$answer_arr = array("answer" => array($answer['answer']));
	        	}
	        	if(isset($answer['answer'])){ 
		        	foreach ($standard['answer'] as $key => $value) {
			        	if ($exercise->categroy_id == Exercises::CATE_CHOOSE) {
			        		if (in_array($value, $answer['answer'])) {
			        			$flag = true;
			        		}else{
			        			$flag = false;
			        			break;
			        		}
			        	}elseif ($exercise->categroy_id == Exercises::CATE_FILL){
			        		if (!isset($answer['answer'][$key]) || $value != $answer['answer'][$key]){
			        			$flag = false;
			        		}else{
			        			$score += 2 * 100;
			        		}
			        	}else{
			        		if (!isset($answer['answer'][$key]) || $value != $answer['answer'][$key]){
			        			$flag = false;
			        			break;
			        		}
			        	}
			        }
			    }else{
			    	$flag = false;
			    }    
	        	if ($exercise->categroy_id != Exercises::CATE_FILL) {//填空题
	        		if($flag){
                   	 	$score = $exercise->score;
	                }else{
	                    $score = 0;
	                }
	        	}
                $result = $db->table($user->id)->insert(['work_id' => $input['work_id'], 'type' => 1, 'exe_id' => $answer['id'], 
            	'answer' => json_encode($answer_arr, JSON_UNESCAPED_UNICODE), 'second' => $answer['last'], 'score' => $score,		
            	'sort' => isset($answer['option']) ? json_encode($answer['option'], JSON_UNESCAPED_UNICODE) : NULL, 'status' => 2]); 
        	}
        	$work_score += $score;
        }
       	if ($result) {
        	$work = Work::find($work->id);
        	$work->score = $work_score;
        	if (isset($type)) {
        		$work->status = 2;
        	}else{
        		$work->status = 4;	
        	}
	        $work->sub_time = time();
	        $work->save();
	    }
        return json_encode($code);
    }
    //同类型习题推送
    public function homotypology($exercises_id, $work_id, $accuracy, $increase){	
    	$exercise_id =  explode('&', $exercises_id);
    	$course = Work::find($work_id)->course_id;
    	$data = array();
    	$error_exercise_list = Exercises::select('categroy_id', 'id', 'score', 'chapter_id')->whereIn('id', $exercise_id)->orderByRaw(DB::raw("FIELD(id, ".implode(',', $exercise_id).')'))->get();//查询出所有错题的数据
    	foreach($error_exercise_list as $exercises) {
    		$homotypology = Exercises::where(['chapter_id' => $exercises->chapter_id, 'categroy_id' => $exercises->categroy_id, 'score' => $exercises->score])
    		->whereNotIn('id', $exercise_id)->inRandomOrder()->take(1)->get();//查询出该错题的1道同类型习题
    		foreach ($homotypology as $exercise) {
				$categroy_id = Category::find($exercise->categroy_id)->id;
				$categroy_title = Category::find($exercise->categroy_id)->title;
				$abcList = range("A","Z");
				$objective = Objective::where('exe_id', $exercise->id)->first();
				$options = json_decode($objective->option, true);
				if ($exercise->categroy_id == Exercises::CATE_FILL) {
					$objective->subject = preg_replace('/(?<=contenteditable\=\")false(?=\")/', 'true', $objective->subject);
				}
				shuffle($options);
			    array_push($data, array(
			    	'id' => $exercise->id,
			    	'parent_id' => $exercises->id,
			    	'categroy_id' => $categroy_id,
					'categroy_title' => $categroy_title,
					'subject' => $objective->subject,
					'type' => 2,
					'options' => $options,
					'answer' => json_decode($objective->answer, true),
					'score' => $exercise->score/100,
			    ));
			}
    	}
    	return view('student.doHomework', compact('data', 'abcList', 'work_id', 'course', 'accuracy', 'increase'));
    }
    //同类型习题算分
    public function sameScore(){
    	$input = Input::get();
    	$work_id = intval($input['work_id']);
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
        $same = $db->table($user->id)->select('work_id')->where('work_id', $work_id)->where('parent_id', '<>', NULL)->get()->toArray();
        if ($same) {
        	$code = 1;
    		return $code;
        }
        foreach ($input['data'] as $answer) {
        	$exercise = Exercises::find($answer['id']);//算出这道题的错误的题
    		$objective = $exercise->hasManyObjective()->first();
    		$flag = true;
    		$standard = json_decode($objective->answer, true);
    		if(is_array($answer['answer'])){
    			$answer_arr = array("answer" => $answer['answer']);
    		}else{
        		$answer_arr = array("answer" => array($answer['answer']));
        	}
        	if (isset($answer['answer'])) {
	    		foreach ($standard['answer'] as $key => $value) {
		        	if ($exercise->categroy_id == Exercises::CATE_CHOOSE) {

		        		if (in_array($value, $answer['answer'])) {
		        			$flag = true;
		        		}else{
		        			$flag = false;
		        			break;
		        		}
		        	}else{
		        		if (!isset($answer['answer'][$key]) || $value != $answer['answer'][$key]){
		        			$flag = false;
		        			break;
		        		}
		        	}
		        }
		    }else{
		    	$flag = false;
		    }
    		if($flag){
           	 	$score = $exercise->score;
            }else{
                $score = 0;
            }
            $result = $db->table($user->id)->insert(['work_id' => $work_id, 'parent_id' => $answer['parent_id'], 'type' => 2, 'exe_id' => $answer['id'], 'answer' =>json_encode($answer_arr,JSON_UNESCAPED_UNICODE),'second' => $answer['last'], 'score' => $score, 'sort' => isset($answer['option']) ? json_encode($answer['option'], JSON_UNESCAPED_UNICODE) : NULL, 'status' => 2]);
        }
        return $code;
    }
    //修改密码
    public function updatePwd(){
    	$user = Auth::user();
    	$input = Input::get();
    	if (Session::get('milkcaptcha') != $input['data']['code']) { 
    		$result = 201;
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
    //秒数转时间戳
    function changeTimeType($seconds){
	    if ($seconds > 3600){
	        $hours = intval($seconds/3600);
	        $minutes = $seconds % 3600;
	        $time = $hours.":".gmstrftime('%M:%S', $minutes);
	    }else{
	        $time = gmstrftime('%H:%M:%S', $seconds);
	    }
	    return $time;
	}
    //学生选择班级页面   小胡歌
    public function selectClass($grade_id){
    	$title = "选择班级";
        $class_list = Classes::where('parent_id',$grade_id)->pluck('title','id');
        return view('student.pf-login-student',compact('title','grade_id','class_list'));
    }
    //学生选择班级
    public function studentSelectClass(){
    	$input = Input::get();
    	$student = Auth::guard('student')->user();
    	$student->class_id = $input['select-class'];
    	$student->save();
    	return json_encode(["code" => 200]);
    }
}