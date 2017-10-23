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
use Schema;

class ExerciseBookController extends Controller
{
    //启动别的数据库
/*	public function dbInfo(){
	    $baseNum = (int)($user->id/1000-0.0001)+1;
    	$db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
        	$db = DB::connection($db_name);
        }catch(\Exception $e){
            $this->createBase($baseNum);
            $db = DB::connection($db_name);
        }
	}
*/
	//习题册 学生的复习、同类型练习 多传一个参数，判断是1是复习，2是同类型练习
    public function freePractice($course = 2, $work_id = 1) {
    	$data = [];
    	$user = Auth::user();
    	if ($work_id == 1) {
    		$work = Work::select('id')->where(['student_id' => $user->id, 'course_id' => $course])->get();//查询出这个学生所有的作业work_id;
    	}else{
    		$work = Work::select('id')->where(['student_id' => $user->id, 'course_id' => $course])->orderBy('id', 'desc')->first();//查询出这个学生所有的作业work_id;
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
        return $data;
    }
    //习题册 学生的预习
    public function foreExercise($course = 1) {
    	$user = Auth::user(); //查看当前老师
    	$workId = Work::select('id')->where(['student_id' => $user->id,'course_id' => $course])->get()->toArray();//查询出所有作业
/*	    if (empty($workId)) {
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
            }*/
    	}else{

	        $workInfo = $db->table($user->id)->select('exe_id')->whereIn('work_id', $workId)->get()->toArray();//查询所有的作业
    	}
    	return json_encode($result);
    }
    //先查询所有这位学生的作业错题本
    public function errorsExercise($course = 2) {
        $data = [];
        $user = Auth::user();
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
        return $data;
    }        
/*    public function errorsExercise($course = 2){
        $data = array();
        $user = Auth::user();
        //$workId = Work::select('id')->where(['student_id' => $user->id,'course_id' => $course])->get();//查询出这个学生的所有作业
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }

        $result = $db->table($user->id)->select('work_id','exe_id')->whereIn('work_id',$workId)->where(['score' => 0])->get();//查询出所有的这个学生错误的exe_id 题型id，
        foreach($result as $exercise){ //通过循环把日期最早的错题归结在那个作业下
        	$work = Work::find($exercise->work_id);
            $workTitle = $work->belongsToJob()->first()->title;//查出这次作业的名称，老师名字老师自取
            $point = Exercises::where('id',$exercise->exe_id)->first()->chapter_id;//找到这个作业题型的在哪个知识点下
            $minutia = Chapter::where('id',$point)->first();//获取这个小节的知识点
            $chapter = Chapter::where('id',$minutia->parent_id)->first();//获取这个知识点的大章节
            $data[$chapter->id]["chapter"] = $chapter->title;
            $data[$chapter->id][$minutia->id]["title"] = $minutia->title;
            //dd($data[$chapter->id][$minutia->id]["title"]);
            $data[$chapter->id][$minutia->id]["work"] = $workTitle;
            $data[$chapter->id][$minutia->id]["work"] = isset($data[$chapter->id][$minutia->id]["work"]) ? $data[$chapter->id][$minutia->id]["work"] : array();
            array_push($data[$chapter->id][$minutia->id]["work"],array("workTitle" => $workTitle,"exe_id" => $exercise->exe_id)
            );
        }
        return json_encode($data);
    }*/
    //这个学生某个章节错了多少题
    public function chapterErrorExercise($course,$chapter) {
    	$data = [];
    	$user = Auth::user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
    	try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        $errorsExeId = $db->table($user->id)->select('exe_id')->where('score', 0)->get();//查询这个学生的所有的错题
        $chapterExercises = Exercises::select('id', 'exe_type', 'categroy_id', 'chapter_id')->whereIn('exe_id',$errorsExeId)->where('chapter_id',$chapter)->get();//查询这个学生单个章节的所有错题
        foreach($chapterExercises as $exercise) { 
        	$categroy_id = Category::find($exercise->categroy_id)->id;
    		$categroy_title = Category::find($exercise->categroy_id)->title;
        	if ($exercise->exe_type == Exercises::TYPE_OBJECTIVE) {
        		$objective = Objective::find($exercise->id);
        		$exercisesSort = $db->table($user->id)->select('sort')->where('exe_id',$exercise->id)->get();//查询这个学生的单个的错题
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
				'options' => $options,
		    ));
        	}else if ($exercise->exe_type == Exercises::TYPE_SUBJECTIVE) {
        		$subjective = Subjective::find($exercise->id);
        		array_push($data, array(
        			'id' => $exercise->id,
			    	'categroy_id' => $categroy_id,
					'categroy_title' => $categroy_title,
					'subject' => $subjective->subject,
        		));
        	}
        }
        return view("aaa");
    }
    //错题的题型
    public function errorExerciseInfo($exe_id) {
        $data = [];
        $abcList = range("A","Z");
        $user = Auth::user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        $errorExercise = $db->table($user->id)->where('exe_id', $exe_id)->first();
        $errorReports = Exercises::find($exercise_id);
        if ($errorReports->exe_type == Exercises::TYPE_OBJECTIVE) {
            $categroy_id = Category::find($errorReports->Category->id);
            $option = [];
            if (!empty($errorReports->sort)) {
                foreach(json_decode($workFirst->sort) as $sort){
                    array_push($option,json_decode($objective->option,true)[$sort-1]);
                }
            }
            $answer_list = json_decode($objective->answer, true);//标准答案的记录
            $work_answer = json_decode($errorExercise->answer,true);//自己答题情况
            $answers = [];
            if ($errorReports->categroy == Exercises::CATE_CHOOSE || $errorReports->categroy_id == Exercises::CATE_RADIO) {
                $standard_answer = [];
                $user_answer = [];
                foreach ($answer_list as $answer) {
                    array_push($standard_answer, empty($work_answer) ? '' : $answer_list);
                }
                foreach ($work_answer as $value) {
                    array_push($user_answer, empty($work_answer) ? '' : $work_answer);
                }
                array_push($answers, array('standard' => $standard_answer, 'user_answer' => $work_answer));
            }else{
                array_push($answers, array('standard' => $answer_list, 'user_answer' => $work_answer));
            }
            array_push($data, array(
                'id' => $errorReports->id,
                'categroy_id' => $categroy_id,
                'subject' => $objective->subject,
                'options' => $option,
                'answer' => $answers,
                'score' => $errorReports->score/100,
                'second' => $errorExercise->second,
                'sameScore' => $errorExercise->score,
            ));
        }else if ($errorReports->exe_type == TYPE_SUBJECTIVE) {
            dd(11);
        }
    }
    //学生复习，预习，同步练习，错题本做的作业页面 状态码3代表错题本
    public function practice($course, $chapter_id, $type = null){
    	$data =[];
        if ($type != 3) {
            $randomExeercise = Exercises::where(['chapter_id' => $chapter_id, 'course' => $course])->inRandomOrder()->take(15)->get();//查询出随机的15道题的内容
        }else{
            $exercise_id = Exercises::where('chapter_id', $chapter_id)->get()->pluck('id');//找到这个章节下的所有的题目
        }
    	foreach ($randomExeercise as $exercise) {
    		$categroy_id = Category::find($exercise->categroy_id)->id;
    		$categroy_title = Category::find($exercise->categroy_id)->title;
			$abcList = range("A","Z");
			$objective= Objective::where('exe_id', $exercise->id)->first();
			$options = json_decode($objective->option, true);
			if ($exercise->categroy_id == Exercises::CATE_FILL) {
				$objective->subject = preg_replace('/(?<=contenteditable\=\")false(?=\")/', 'true', $objective->subject);
			}
			shuffle($options);
		    array_push($data, array(
		    	'id' => $exercise->id,
                'type' => $type,
		    	'categroy_id' => $categroy_id,
				'categroy_title' => $categroy_title,
				'subject' => $objective->subject,
				'options' => $options,
				'answer' => json_decode($objective->answer, true),
				'score' => $exercise->score/100,
		    ));
    	}
    	return view('student.doHomework', compact('data', 'course', 'abcList'));
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

    }
    //当前学生收藏的所有的题目
    public function studentCollect(){

    }
}