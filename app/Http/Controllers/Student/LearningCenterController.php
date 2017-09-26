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
	const FUNC_EXERCISE_BOOK = 'exercise_book';
	const FUNC_ROUTINE_WORK = 'routine_work';
	const FUNC_WORK_SCORE = 'work_score';
	const FUNC_ERROR_REPORTS = 'error_reports';
	const FUNC_ANSWER_SHEET = 'answer_sheet';
	const FUNC_WORK_TUTORSHIP = 'work_tutorship';//分数提升
	
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
	    $data = Work::where(['student_id' => $user->id])->whereIn('job_id',$job_list)->paginate(5);//显示所有的做作业
	    $count = count($data);
		$baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        //判断这个学生有没有做过作业,有做过作业显示引导页

        //$work_id = array_column(Work::where(['student_id' => $user->id,])->get()->toarray(), 'id');//这里要是没有学生写作业怎么办就会报错
        //$workCount = $db->table($user->id)->select('work_id')->whereIn('work_id',$work_id)->get()->toArray();
        if ($func == Self::FUNC_STUDENT_NAME){
        	$provinces = Region::where('type',1)->get();
        }elseif ($func == Self::FUNC_EXERCISE_BOOK) {
        	$sameSecond = 0;
			foreach ($data as $work) {
				$minutia = Chapter::find($work->chapter_id);
				$chapter = Chapter::where('id',$minutia->parent_id)->get(['title']);
		        $work->title = $work->belongsToJob()->first()->title;
		        $work->pub_time = $work->belongsToJob()->first()->pub_time;
		        $work->deadline = $work->belongsToJob()->first()->deadline;
		        $work->job_type = $work->belongsToJob()->first()->job_type;
		        $info_list = $db->table($user->id)->select('score','parent_id','second')->where('work_id',$work->id)->get();
		       	foreach($info_list as $info){
		       		if (!empty($info->parent_id)) {
		       			$sameSecond += $info->second;
		       		}
			        $work->score += isset($data['score']) ? $data['score'] + $info->score/100 : 0 + $info->score/100;
		    	}
		    	$second = $work->sub_time - $work->start_time + $sameSecond;
		    	$work->second = $this->changeTimeType($second);
			}
		}elseif ($func == Self::FUNC_ROUTINE_WORK){
			$chapter_id = Work::find($parameter)->chapter_id;
			$minutia =  Chapter::find($chapter_id);
			$chapter = Chapter::where('id',$minutia->parent_id)->get(['title']);

			$data['work'] = Work::find($parameter)->belongsToJob()->first();
			$data['count'] = count($data['work']->exercise_id);
		}
		return view('student.todayWork',compact('courseAll','courseFirst','data','count','func','parameter','user','minutia','chapter','workCount'));
    }
    public function learningCenter($course = 1, $mod = 1, $func = 1, $parameter = null, $exercise_id = null, $several = 1){
    	$user = Auth::guard('student')->user();
    	$courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray(); 
        $data = array();
        $data['status'] = array();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        if ($mod == Self::MOD_HOMEWORK) {
 			if ($func == Self::FUNC_EXERCISE_BOOK) {
 				$sameSecond = 0;
		    	$data = Work::where(['student_id' => $user->id,'course_id' => $course])->paginate(5);
				foreach ($data as $work) {
					$minutia = Chapter::find($work->chapter_id);
					$chapter = Chapter::where('id',$minutia->parent_id)->get(['title']);
			        $work->title = $work->belongsToJob()->first()->title;
			        $work->pub_time = $work->belongsToJob()->first()->pub_time;
			        $work->deadline = $work->belongsToJob()->first()->deadline;
			        $work->job_type = $work->belongsToJob()->first()->job_type;
			        $info_list = $db->table($user->id)->select('score','parent_id','second')->where('work_id',$work->id)->get();
			       	foreach($info_list as $info){
			       		if (!empty($info->parent_id)) {
		       				$sameSecond += $info->second;
		       			}
				        $work->score += isset($data['score']) ? $data['score'] + $info->score/100 : 0 + $info->score/100;
			    	}
			    	$second = $work->sub_time - $work->start_time + $sameSecond;
			    	$work->second = $this->changeTimeType($second);
				}
		 	}else if ($func == Self::FUNC_ROUTINE_WORK ||  $func == Self::FUNC_WORK_SCORE) {
		 		$work = Work::select('chapter_id','sub_time','start_time','course_id')->find($parameter);
				$minutia =  Chapter::find($work->chapter_id);
				$chapter = Chapter::where('id',$minutia->parent_id)->get(['title']);
				$data['course_id'] = $work->course_id;
				$data['sub_time'] = $work->sub_time;
		 		$data['work'] = Work::find($parameter)->belongsToJob()->first();
				$data['count'] = count($data['work']->exercise_id);
				if ($func == Self::FUNC_WORK_SCORE) {
					$correctScore = 0; //正确题的分数
					$errorScore = 0; //错误题的分数
					$exercise_id = json_decode($data['work']->exercise_id,true);//有两种判断方法 一种判断分数有没有值，第二种答案对比
					$data['objectiveCount'] = 0;
					$data['objectiveErrorCount'] = 0;
					$data['modifyCount'] = 0;
					foreach ($exercise_id as $exe_id) {
						$exercise = Exercises::find($exe_id);
						$work_answer = $db->table($user->id)->where(['work_id' => $parameter,'exe_id' => $exe_id])->first()->answer;
						$work_answer = json_decode($work_answer,true)['answer'];

						//客观题的正确率
						if ($exercise->exe_type ==Exercises::TYPE_OBJECTIVE) {
							$objective_answer = Objective::where('exe_id',$exercise->id)->first()->answer;//客观题的答案
							$objective_answer = json_decode($objective_answer,true)['answer'];
							if ($work_answer == $objective_answer) {

								$data['objectiveCount'] = $data['objectiveCount'] + 1;		//正确多少道题		
								array_push($data['status'],array(
									'id' => 1,
									'exe_id' => $exe_id,
								));
								$correctScore += $exercise->score / 100; //正确题的分数
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
					//同类型练习
					$same_list = $db->table($user->id)->where(['work_id' => $parameter])->where('parent_id','<>',null)->get();
					foreach($same_list as $sameExercise){
						if ($sameExercise->score != 0) {
							array_push($data['sameExercise'], array(
								'id' => 1,
								"exe_id" => $sameExercise->exe_id,
								"parent_id" =>$sameExercise->exe_id
							));
						}else{
							array_push($data['sameExercise'], array(
								'id' => 2,
								"exe_id" => $sameExercise->parent_id,
								"parent_id" =>$sameExercise->parent_id
							));
						}
					}
					$second =$data['sub_time'] - $work->start_time;
					if (empty($same_list->toArray())) {
						$data['exeSecond'] = strtotime($this->changeTimeType($second));
						$tutorship = implode('&',$tutorship); //所有的错题ID
						$totalScore = $correctScore+$errorScore+0; //主观题先设为0
						$accuracy = $correctScore / $totalScore;//这里算分数率，
					}else{
						$sameSecond = 0;
						$grossScore = 0;
						$exeScore = 0;
						$grossExercise = $db->table($user->id)->select('score','second','parent_id')->where('work_id',$parameter)->get();//查询所有的作业以及同类型练习的信息
						foreach ($grossExercise as $exercise) {
							if (!empty($exercise->parent_id)) {
								$sameSecond += $exercise->second;
							}
							$grossScore += $exercise->score;
						}
						$exeSecond = $second + $sameSecond;
						$data['exeSecond'] = strtotime($this->changeTimeType($exeSecond));
				 		foreach ($exercise_id as $exe) {//作业的所有的分数
				 			$exeScore += Exercises::where('id',$exe)->first()->score; 
				 		}
				 		$accuracy = $grossScore / $exeScore;//总分数率
					}
					if(is_int($accuracy)){
						$accuracy = $accuracy;
					}else{
						$data['accuracy'] = round($data['accuracy'],4);
					}
				}
		 	}else if ($func == Self::FUNC_ERROR_REPORTS) {
		 		//dd($course);
		 		$abcList = ['A', 'B', 'C', 'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];	 		
		 		if (empty($exercise_id)) {
		 			$work_answer = $db->table($user->id)->where(['work_id' => $parameter,'score' => 0 ])->first();
		 			$exercise_id = $work_answer->exe_id;
		 		}
		 		$workFirst = $db->table($user->id)->where(['work_id' => $parameter,'exe_id' => $exercise_id])->first();
		 		$errorReports = Exercises::find($exercise_id);
		 		$data = array('exercises' => array());
		 		if($workFirst->parent_id == NULL){
		 			$data['workCount'] = count($db->table($user->id)->where(['work_id' => $parameter])->where("parent_id",null)->get());
		 		}else{
		 			$errorExercise = "errorExercise";
		 			$data['workCount'] = count($db->table($user->id)->where(['work_id' => $parameter])->where("parent_id","<>",null)->get());
		 		}
		 		$categroy_id = Categroy::find($errorReports->categroy_id)->id;
    			$categroy_title = Categroy::find($errorReports->categroy_id)->title;
		 		if ($errorReports->exe_type == Exercises::TYPE_OBJECTIVE) {
		 			$objective = Objective::where('exe_id',$errorReports->id)->first();
		 			$option = array();
		 			if (!empty($workFirst->sort)) {
			 			foreach(json_decode($workFirst->sort) as $sort){
			 				array_push($option,json_decode($objective->option,true)[$sort-1]);
			 			}
			 		}
		 			$answer_list = json_decode($objective->answer,true);	 //标准答案的记录
		            $work_answer = json_decode($workFirst->answer,true); //自己写的答案记录
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
                    'options' => $option,
                    'answer' => $answers,
                    'score' => $errorReports->score/100,
                    'second' => $workFirst->second,
                    ));
		 		}else{
		 			dd("此处是主观题");
		 		}
		 	}else if ($func == Self::FUNC_ANSWER_SHEET) {//错题卡
		 		$error_work = $db->table($user->id)->select('exe_id')->where(['work_id' => $parameter,'score' => 0 ])->where('parent_id',null)->get();
		 		$error_same = $db->table($user->id)->select('exe_id','parent_id')->where(['work_id' => $parameter,'score' => 0 ])->where('parent_id','<>',null)->get();
		 		$data = array('error_work' => $error_work->toArray(),'error_same' => $error_same->toArray());
		 	}else if ($func == Self::FUNC_WORK_TUTORSHIP) {//查询出同类型习题的
		 		$work = Work::select('start_time','sub_time')->find($parameter);
		 		$second = $work->sub_time - $work->start_time;
		 		$several = explode('&',$several);
		 		$grossScore = 0;
		 		$exeScore = 0;
		 		$exeSecond = 0;
		 		$SecondAdding = 0;	
		 		$sameExercise = $db->table($user->id)->select('score','exe_id','second')->where('work_id',$parameter)->where('parent_id','<>',NULl)->get();//本次的同类型习题
		 		$grossExercise = $db->table($user->id)->select('score')->where('work_id',$parameter)->get();//查询所有的作业以及同类型练习的信息
		 		$exerciseCount =  $db->table($user->id)->select('exe_id')->where(['work_id' => $parameter])->where('parent_id',null)->get();//算出所有的作业的所有题
		 		foreach ($exerciseCount as $exe) {//作业的所有的分数
		 			$exeScore += Exercises::where('id',$exe->exe_id)->first()->score; 
		 		}
		 		//查询所有的作业以及同类型练习加起来的分数
		 		foreach($grossExercise as $exercise){
		 			$grossScore += $exercise->score;
		 		}
		 		$accuracy = $grossScore / $exeScore;//总分数率
		 		if(is_int($accuracy)){
					$accuracy = $accuracy;
				}else{
					$accuracy = round($accuracy,4);
				}
		 		$data = array();
				foreach($sameExercise as $exercise){
					if ($exercise->score == 0) {
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
					$exeSecond += $db->table($user->id)->where(['work_id' => $parameter,'exe_id' => $exercise->exe_id])->first()->second;
				}
				$SecondAdding = $second + $exeSecond;
				$entire = strtotime($this->changeTimeType($SecondAdding));
		 	}
        }
    	return view('student.learningCenter',compact('courseAll','courseFirst','data','mod','func','parameter','several','user','minutia','chapter','abcList','tutorship','accuracy','errorExercise','entire'));
    }
    public function doHomework($work_id = NULL){
			$work = Work::find($work_id);
			if (empty($work->start_time)) {
				$work->start_time = time();
				$work->save();
			}
			$course = $work->course_id;
			$data = array();
			$exercises = json_decode($work->belongsToJob()->first()->exercise_id,true);
			foreach ($exercises as  $eid) {
				$exercise = Exercises::find($eid);
				$categroy_id = Categroy::find($exercise->categroy_id)->id;
				$categroy_title = Categroy::find($exercise->categroy_id)->title;
				if ($exercise->exe_type == Exercises::TYPE_SUBJECTIVE) {
					$subjective = Subjective::where('exe_id',$exercise->id)->first();
					array_push($data, array(
						'id' => $exercise->id,
						'categroy_id' => $categroy_id,
						'categroy_title' => $categroy_title,
						'subject' => $subjective->subject,
						'score' => $exercise->score/100,
					));
				}else if ($exercise->exe_type == Exercises::TYPE_OBJECTIVE) {
					$abcList = ['A', 'B', 'C', 'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
					$objective = Objective::where('exe_id',$exercise->id)->first();
					$options = json_decode($objective->option,true);
					if ($exercise->categroy_id == Exercises::CATE_FILL) {
						$objective->subject = preg_replace('/(?<=contenteditable\=\")false(?=\")/','true',$objective->subject);
					}
					shuffle($options);
				    array_push($data, array(
				    	'id' => $exercise->id,
				    	'categroy_id' => $categroy_id,
						'categroy_title' => $categroy_title,
						'subject' => $objective->subject,
						'options' => $options,
						'answer' => json_decode($objective->answer,true), /*explode(',', $objective->answer),*/
						'score' => $exercise->score/100,
				    ));
				}
    		}
    	return view('student.doHomework',compact('data','work_id','course','abcList'));
    }
    //ajax json 格式
   /* public function doHomework($work_id = null){
    	$work = Work::find($work_id);
    	$data = array('work_id' => $work_id,'exercises' => array());
    	$exercises = explode(',',$work->belongsToJob()->first()->exercise_id);
    	foreach ($exercises as $eid) {
    		$exercise = Exercises::find($eid);
    		$categroy_id = Categroy::find($exercise->categroy_id)->id;
    		$categroy_title = Categroy::find($exercise->categroy_id)->title;
    		if ($exercise->exe_type == Exercises::TYPE_SUBJECTIVE) {//客观题
    			$subjective = Subjective::where('exe_id',$exercise->id)->first();
    			array_push($data['exercises'], array(
    				'id' => $exercise->id,
    				'categroy_id' => $categroy_id,
    				'categroy_title' => $categroy_title,
    				'subject' => $subjective->subject,
    				'score' => $exercise->score/100,
    			));
    		}else if($exercise->exe_type == Exercise::TYPE_OBJECTIVE){//主观题
    			$objective = Objective::where('exe_id',$exercise->id)->first();
    			array_push($data['exercises'],array(
    				'id' => $exercise->id,
			    	'categroy_id' => $categroy_id,
    				'categroy_title' => $categroy_title,
    				'subject' => $objective->subject,
    				'option' => json_encode($objective->option,true),
    				'answer' => explode(',', $objective->answer),
    				'score' => $exercise->score/100,
    			));
    		}
    	}
    	return json_encode($data);
    }*/
    //作业的分数
    public function homeworkScores(){
    	$input = Input::get();
    	var_dump($input);
    	die();
    	$user = Auth::guard('student')->user();
    	$work = Work::find(intval($input['work_id']));
    	if (!empty($work->sub_time )) {
    		$code = 1;

    		return $code;
    	}
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
                $table->integer('exe_id')->nullable();;
                $table->integer('parent_id')->nullable();;
                $table->integer('type')->nullable();;
                $table->text('answer')->nullable();
                $table->integer('second')->nullable();
                $table->smallInteger('score')->default(0);
                $table->string('comment',200)->nullable();
                $table->string('sort',200)->nullable();
            });
        }

        foreach ($input['data'] as $answer) {
        	$exercise = Exercises::find($answer['id']);
        	if ($exercise->exe_type == Exercises::TYPE_SUBJECTIVE) {
        		$db->table($user->id)->insert(['work_id' => $input['work_id'],'type' => 1,'exe_id' => $answer->id,'answer' => json_encode($answer->answer,JSON_UNESCAPED_UNICODE),'second' => $answer->last,'sort' => json_encode($answer['option'],JSON_UNESCAPED_UNICODE)]);
        	}else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
        		$objective = $exercise->hasManyObjective()->first();
        		$flag = true;
        		$standard = json_decode($objective->answer,true);
        		if(is_array($answer['answer'])){		
        			$answer_arr = array("answer" => $answer['answer']);
        		}else{
	        		$answer_arr = array("answer" => array($answer['answer']));
	        	}
	        	foreach ($standard['answer'] as $key => $value) {
	        		if (!isset($answer['answer'][$key]) || $value != $answer['answer'][$key]) {
	        			$flag = false;
	        		}else{
	        			$score += 2 * 100;
	        		}
	        	}
	        	if ($exercise->categroy_id != Exercises::CATE_FILL) {
	        		if($flag){
                   	 	$score = $exercise->score;
	                }else{
	                    $score = 0;
	                }
	        	}
                $result = $db->table($user->id)->insert(['work_id' => $input['work_id'],'type' => 1,'exe_id' => $answer['id'],'answer' => json_encode($answer_arr,JSON_UNESCAPED_UNICODE),'second' => $answer['last'],'score' => $score,'sort' => isset($answer['option']) ? json_encode($answer['option'],JSON_UNESCAPED_UNICODE) : NULL]);
        	}
        }
       	if ($result) {
        	$work = Work::find($work->id);
	        $work->sub_time = time();
	        $work->save();
        }
        return json_encode($code);
    }
    //同类型习题推送
    public function homotypology($exercises_id,$work_id,$accuracy,$increase){
    	$exercise_id = explode('&', $exercises_id);
    	$data = array();
    	$error_exercise_list = Exercises::whereIn('id',$exercise_id)->get();
    	$error_cate_arr = array();
    	foreach ($error_exercise_list as $exercise) {
    		$error_cate_arr[$exercise->categroy_id] = isset($error_cate_arr[$exercise->categroy_id]) ? $error_cate_arr[$exercise->categroy_id] : array();
    		array_push($error_cate_arr[$exercise->categroy_id],$exercise->id);
    	}

    	foreach ($error_cate_arr as $cate_id => $exe_id_list) {
    		$errorsCount = count($exe_id_list);
    		$homotypology = Exercises::where(['chapter_id' => Work::find($work_id)->chapter_id,'categroy_id' =>$cate_id ])
			->whereNotIn('id',$exe_id_list)->orderBy(\DB::raw('RAND()'))->take($errorsCount)->get();//查询出该错题的3道同类型习题
			foreach ($homotypology as $key => $exercise) {
				$categroy_id = Categroy::find($exercise->categroy_id)->id;
				$categroy_title = Categroy::find($exercise->categroy_id)->title;
				$abcList = ['A', 'B', 'C', 'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
				$objective = Objective::where('exe_id',$exercise->id)->first();
				$options = json_decode($objective->option,true);
				shuffle($options);
			    array_push($data, array(
			    	'id' => $exercise->id,
			    	'parent_id' => $exe_id_list[$key],
			    	'categroy_id' => $categroy_id,
					'categroy_title' => $categroy_title,
					'subject' => $objective->subject,
					'type' => 2,
					'options' => $options,
					'answer' => json_decode($objective->answer,true),
					'score' => $exercise->score/100,
			    ));
			}
    	}
		return view('student.doHomework',compact('data','abcList','work_id','course','accuracy','increase'));
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
        $same = $db->table($user->id)->select('work_id')->where('work_id',$work_id)->where('parent_id','<>',NULL)->get()->toArray();
        if ($same) {
        	$code = 1;
    		return $code;
        }
        foreach ($input['data'] as $answer) {
        	$exercise = Exercises::find($answer['parent_id']);//算出这道题的错误的题
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
            $result = $db->table($user->id)->insert(['work_id' => $work_id,'parent_id' => $answer['parent_id'],'type' => 2,'exe_id' => $answer['id'],'answer' =>json_encode($answer_arr,JSON_UNESCAPED_UNICODE),'second' => $answer['last'],'sort' => isset($answer['option']) ? json_encode($answer['option'],JSON_UNESCAPED_UNICODE) : NULL]);
        }
        return $code;
    }
 	//错误习题

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
    
    //习题册
     public function review($course = 2){
    	//获取所有该学生所有作业的id
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
    }
    //预习
    public function foreExercise($course = 2){
    	$user = Auth::guard('student')->user();
    	$minutia_id = Work::where(['student_id' => $user->id,'course_id' => $course])->get()->pluck('Chapter_id');//查询出所有作业
    	$minutia_parentId = Chapter::where('course_id',$course)->whereIn('id',$minutia_id)->get()->pluck('parent_id');//查询出小节的父id
    	$chapter = Chapter::where('course_id',$course)->whereNotIn('id',$minutia_parentId)->get();//查询出除了复习的所有大章节
    }
    //错题本
    public function errorsExercise($course = 2){
    	//先查询所有这位学生的作业
    	$user = Auth::guard('student')->user();
    	$baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
    	$work_info = $db->table($user->id)->where('score',0)->get(['exe_id'])->toArray();//查询出这个学生的所有错题
    }
    //收藏
    public function collect(){

    }

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
    //学生选择班级页面    小胡歌
    public function selectClass($grade_id){
    	$title = "选择班级";
        $class_list = Classs::where('parent_id',$grade_id)->pluck('title','id');
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
