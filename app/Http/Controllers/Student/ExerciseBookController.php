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
use App\Models\Categroy;
use App\Models\Subjective;
use App\Models\Chapter;
use App\Models\Classes;
use App\Models\Course;
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
    //public function 
	//习题册 学生的复习、同类型练习 多传一个参数，判断是1是复习，2是同类型练习
    public function freePractice($course = 2, $parameter = 1) {
    	$data = [];
    	$user = Auth::guard('student')->user();
    	if ($parameter == 1) {
    		$workId = Work::select('id')->where(['student_id' => $user->id, 'course_id' => $course])->get();//查询出这个学生所有的作业work_id;
    	}else{
    		$workId = Work::select('id')->where(['student_id' => $user->id, 'course_id' => $course])->orderBy('id', 'desc')->first();//查询出这个学生所有的作业work_id;
    	}
    	if (empty($workId)) {//该学生还没有作业
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
	        $workInfo = $db->table($user->id)->whereIn('work_id', $workId)->get()->pluck(['exe_id']);//查询所有的作业
	        $exerciseChapter = Exercises::whereIn('id',$workInfo)->pluck('chapter_id')->unique();
	        $minutiaList = Chapter::where('course_id',$course)->whereIn('id',$exerciseChapter)->get()->toArray();//查询出小节的父id 
	        $minutia_parentId = array_column($minutiaList, 'parent_id');//所有作业的parent_id
	        $chapter = Chapter::where('course_id',$course)->whereIn('id',$minutia_parentId)->get();//查询出大章节信息
			foreach ($chapter as $key => $item) {
				$data[$key]['id'] = $item->id;
				$data[$key]['title'] = $item->title;
				$data[$key]['minutia'] = array();
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

  /*  public function syncExercise($course = 2){
    	$data = [];
    	$user = Auth::guard('student')->user();
    	$workId = Work::select('id')->where(['student_id' => $user->id, 'course_id' => $course])->orderBy('id', 'desc')->first()->toArray();//查询出这个学生所有的作业work_id;
    	if (empty($workId)) {//该学生还没有作业
    		$result = [];
    	}else{
		    $baseNum = (int)($user->id/1000-0.0001)+1;
	    	$db_name = 'mysql_stu_work_info_'.$baseNum;
	        try{
	        	$db = DB::connection($db_name);
	        }catch(\Exception $e){
	            $this->createBase($baseNum);
	            $db = DB::connection($db_name);
	        }
	        $workInfo = $db->table($user->id)->whereIn('work_id', $workId)->get()->pluck(['exe_id']);//查询所有的作业
	        $exerciseChapter = Exercises::whereIn('id',$workInfo)->pluck('chapter_id')->unique();
	        foreach($exerciseChapter as $chapter_id){
	        	$minutia = Chapter::where('id', $chapter_id)->first()->parent_id;//查询出所有的大节
	        	$chapter = Chapter::select('id', 'title', 'parent_id')->where('id', $minutia)->first();
	        	$elementTitle = Chapter::where('id', $chapter->parent_id)->first()->title;
	        	array_push($data, array(
	        		"title" => $elementTitle,
	        		"chapter" => ['id' => $chapter->id, 'title' => $chapter->title],
	        	));
	        }
	        return $data;
		}
    }*/

    //习题册 学生的预习
    public function foreExercise($course = 1) {
    	$user = Auth::guard('student')->user(); //查看当前老师
    	$workId = Work::select('id')->where(['student_id' => $user->id,'course_id' => $course])->get()->toArray();//查询出所有作业
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            $this->createBase($baseNum);
            $db = DB::connection($db_name);
        }
	    if (empty($workId)) {
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

    	}else{
	        $workInfo = $db->table($user->id)->select('exe_id')->whereIn('work_id', $workId)->get()->toArray();//查询所有的作业
    	}
    	return json_encode($result);
    }
    //先查询所有这位学生的作业错题本
    public function errorsExercise($course = 2) {
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

       // $completenes = $db->table($user->id)->where('type', 3)->get();//3代表这个人所有练习的错误练习的题


        $exe_id = $db->table($user->id)->where('score', 0)->get()->pluck(['exe_id']);//查询所有的错题
        $exerciseChapter = Exercises::whereIn('id',$exe_id)->pluck('chapter_id')->unique();
        $minutiaList = Chapter::where('course_id',$course)->whereIn('id',$exerciseChapter)->get()->toArray();//查询出小节的父id 
        $minutia_parentId = array_column($minutiaList, 'parent_id');//所有作业的parent_id
        $chapter = Chapter::where('course_id',$course)->whereIn('id',$minutia_parentId)->get();//查询出大章节信息
        foreach ($chapter as $key => $item) {
            $data[$key]['id'] = $item->id;
            $data[$key]['title'] = $item->title;
            // $data[$kay]['completeness'] 
            $data[$key]['minutia'] = array();
            foreach ($minutiaList as  $k => $minutia) {
                $minutiaPat = Chapter::find($minutia['id'])->parent_id;
                if ($minutiaPat == $item->id) {
                    $data[$key]['minutia'][$k]['id'] = $minutia['id'];
                    $data[$key]['minutia'][$k]['title'] = $minutia['title'];
                }
            }
        }
        return view('student.exerciseBase.wrongNotebook_list',compact("data", "func", "user", 'courseAll', 'courseFirst'));
    }






    public function errorsExerciseShowWork($course = 2) {
        $func = "";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $user = Auth::guard('student')->user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        return view('student.exerciseBase.wrongNotebook_showWork',compact("func", "user", 'courseAll', 'courseFirst'));
    }
    public function errorsExerciseDoWork($course = 2) {
        $func = "";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $user = Auth::guard('student')->user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        return view('student.exerciseBase.wrongNotebook_doWork',compact("func", "user", 'courseAll', 'courseFirst'));
    }
    public function foreExercise1($course = 2) {
        $func = "";
        $courseAll = Course::all();
        $courseFirst = Course::where(['id' => $course])->get()->toArray();
        $user = Auth::guard('student')->user();
        $baseNum = (int)($user->id/1000-0.0001)+1;
        $db_name = 'mysql_stu_work_info_'.$baseNum;
        return view('student.exerciseBase.foreExercise_content',compact("func", "user", 'courseAll', 'courseFirst'));
    }






        /*  $workInfo = $db->table($user->id)->whereIn('work_id', $workId)->get()->pluck(['exe_id']);//查询所有的作业
            $exerciseChapter = Exercises::whereIn('id',$workInfo)->pluck('chapter_id')->unique();
            $minutiaList = Chapter::where('course_id',$course)->whereIn('id',$exerciseChapter)->get()->toArray();//查询出小节的父id 
            $minutia_parentId = array_column($minutiaList, 'parent_id');//所有作业的parent_id
            $chapter = Chapter::where('course_id',$course)->whereIn('id',$minutia_parentId)->get();//查询出大章节信息
            foreach ($chapter as $key => $item) {
                $data[$key]['id'] = $item->id;
                $data[$key]['title'] = $item->title;
                $data[$key]['minutia'] = array();
                foreach ($minutiaList as  $k => $minutia) {
                    $minutiaPat = Chapter::find($minutia['id'])->parent_id; 
                    if ($minutiaPat == $item->id ) {
                        $data[$key]['minutia'][$k]['id'] = $minutia['id'];
                        $data[$key]['minutia'][$k]['title'] = $minutia['title'];
                    }
                }
            }*/

/*    public function errorsExercise($course = 2){
        $data = array();
        $user = Auth::guard('student')->user();
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
    	$user = Auth::guard('student')->user();
    	try{
            $db = DB::connection($db_name);
        }catch(\Exception $e){
            return $e;
        }
        $errorsExeId = $db->table($user->id)->select('exe_id')->where('score', 0)->get();//查询这个学生的所有的错题
        $chapterExercises = Exercises::select('id', 'exe_type', 'categroy_id', 'chapter_id')->whereIn('exe_id',$errorsExeId)->where('chapter_id',$chapter)->get();//查询这个学生单个章节的所有错题
        foreach($chapterExercises as $exercise) { 
        	$categroy_id = Categroy::find($exercise->categroy_id)->id;
    		$categroy_title = Categroy::find($exercise->categroy_id)->title;
        	if ($exercise->exe_type == Exercises::TYPE_OBJECTIVE) {
        		$objective = Objective::find($exercise->id);
        		$exercisesSort = $db->table($user->id)->select('sort')->where('exe_id',$exercise->id)->get();//查询这个学生的单个的错题
        		$option = array();
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

    }
    //学生复习，预习，同步练习，错题本做的作业页面
    function practice($course,$chapter_id,$type){
    	$data = array();
    	$randomExeercise = Exercises::where(['chapter_id' => $chapter_id, 'exe_type' => 1])->inRandomOrder()->take(15)->get();//查询出随机的15道题的内容
    	foreach ($randomExeercise as $exercise) {
    		$categroy_id = Categroy::find($exercise->categroy_id)->id;
    		$categroy_title = Categroy::find($exercise->categroy_id)->title;
			$abcList = range("A","Z");
			$objective= Objective::where('exe_id', $exercise->id)->first();
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
				'answer' => json_decode($objective->answer, true),
				'score' => $exercise->score/100,
		    ));
    	}
    	return view('student.doHomework', compact('data', 'course', 'abcList'));
    }
    //当前学生收藏的所有的题目
    public function studentCollect(){

    }
}