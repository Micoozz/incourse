<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmInfo;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Region;
use App\Models\StuFamily;
use App\Models\StuInfo;
use App\Models\Course;
use App\MOdels\ClassTeacherCourseMap;
use App\Models\Duty;
use Redirect;
use Input;
use Auth;
use Hash;
use Session;
use Searchy;
use DB;


class FileManagerController extends Controller
{
	const FUNC_MANAGER_PWD = 'manager-pwd';
	const FUNC_MANAGER_NAME = 'manager-name';
	//学生功能
	const FUNC_STUDENT_LIST = 'student-list';
	const FUNC_STUDENT_ADD = 'student-add';
	const FUNC_STUDENT_UPDATE = 'student-update';
	const FUNC_CLASS_LIST = 'class-list';
	//老师功能
	const FUNC_TEACHER_AUTHORIZED = 'authorized-teacher';
	const FUNC_TEACHER_UNAUTHORIZED = 'unauthorized-teacher';
	const FUNC_TEACHER_ADD = 'teacher-add';
	const FUNC_TEACHER_UPDATE = 'teacher-update';
	//校长功能
	const FUNC_PRINCIPAL_LIST = 'principal-list';
	//板块功能
	const MOD_STUDENT_FILE = 'student-file';
	const MOD_TEACHER_FILE = 'teacher-file';
	const MOD_PRINCIPAL_FILE = 'principal-file';

 	public function fileManager($mod = 'student-file', $func = 'manager-pwd', $parameter = null, $student = null){
 		$user = Auth::guard('employee')->user();
 		$data['classAll'] = array();
 		$grade_list = Classes::where(['school_id' => $user->school_id,"parent_id" => 0])->orderBy("id","desc")->get();
 		foreach ($grade_list as $grade) {
 			$class_list = Classes::where("parent_id",$grade->id)->get()->toArray();
 			array_push($data["classAll"],array("id" => $grade->id,"title" => $grade->title,"class" => $class_list));
 		}
    $class = Classes::where(['school_id' => $user->school_id,'parent_id' => 0])->orderBy('id','desc')->first();
      if (!empty($class)) {
        $grade = Classes::where(['school_id' => $user->school_id,'parent_id' => $class->id])->first();
        if(empty($grade)){
          $func = 'create-class';
          return view('teacher.fileManager.fileManager',compact('data','mod','func','user'));
        }
      }
 		//管理板块
 		if ($mod == Self::MOD_STUDENT_FILE) {
 			if (Hash::check('123456', $user->password)){
              $func = Self::FUNC_MANAGER_PWD;
      }else{
          	if ($func == Self::FUNC_MANAGER_NAME) {
          		if(empty($user->email)){
          			$provinces = Region::where('type',1)->get();
            	}else{
            		$func = Self::FUNC_STUDENT_LIST;
            		$data['studentAll'] = Student::where(['school_id' => $user->school_id,'class_id' => empty($parameter) ? $grade->id : $parameter])->paginate(5);
            	}
          	}else if($func == Self::FUNC_STUDENT_LIST){
   				  if (!empty($student)) {
                      $Student = Searchy::driver('ufuzzy')->Student('name')->query($student)->get()->toArray();
                      $data['studentAll']  = Student::where('class_id',$parameter)->whereIn('id',array_column($Student, 'id'))->paginate(5);
                  }else{
   					$data['studentAll'] = Student::where(['school_id' => $user->school_id,'class_id' => empty($parameter) ? $grade->id : $parameter])->paginate(5);
   				}

          	}else if ($func == Self::FUNC_STUDENT_ADD || $func == Self::FUNC_STUDENT_UPDATE) {
          		if (!empty($student)) {
          		$data['stuFamily'] = Student::select('id')->with('hasManystu_Family')->whereHas('hasManystu_Family')->find($student);
          		$data['stuInfo'] = Student::with('hasOnestu_Info')->whereHas('hasOnestu_Info')->find($student);
          		$data['stuInfo']['hasOnestu_Info']->province = Region::find($data['stuInfo']['hasOnestu_Info']->city)->name;
              $data['stuInfo']['hasOnestu_Info']->cityName = Region::find($data['stuInfo']['hasOnestu_Info']->city)->fullName;
                if ($func == Self::FUNC_STUDENT_UPDATE) {
                  $data['grade'] = Classes::find($data['stuInfo']->class_id); 
                  $data['classes'] = Classes::where('id',$data['grade']->parent_id)->get();
                }
          		}
          		$provinces = Region::where('type',1)->get();
          	}elseif ($func == Self::FUNC_CLASS_LIST) {
          		$employeeEmail = Employee::find($user->id);
          		$employeeEmail->email = $parameter;
          		$employeeEmail->save();
          	}else{
          		//不是初始密码直接进入
          		if (empty($user->email)) {
          			$func =	Self::FUNC_MANAGER_NAME;
          		}else{
            		$func = Self::FUNC_STUDENT_LIST;
     				    $data['studentAll'] = Student::where(['school_id' => $user->school_id,'class_id' => empty($parameter) ? $grade->id : $parameter])->paginate(5);
     			}
          	}
          	
          }
          //老师界面
 		}else if($mod == Self::MOD_TEACHER_FILE){
 			if ($func == Self::FUNC_TEACHER_AUTHORIZED) {
			  if (!empty($student)) {
                $Employee = Searchy::driver('ufuzzy')->Employee('name')->query($student)->get()->toArray();
               	$data['allot']  = Employee::where(['school_id' => $user->school_id,'class_id' => $parameter])->whereIn('id',array_column($Employee,'id'))->paginate(5);
            }else{
            $map = ClassTeacherCourseMap::where('class_id',empty($parameter) ? $grade->id : $parameter)->get(['id'])->toArray();
					    $data['allot']  = Employee::whereIn('id',array_column($map, 'id'))->paginate(10);
				}

 			}else if($func == Self::FUNC_TEACHER_UNAUTHORIZED){
 				if (!empty($student)) {
                  $Employee = Searchy::driver('ufuzzy')->Employee('name')->query($student)->get()->toArray();
                 	$data['unallot']  = Employee::where(['school_id' => $user->school_id])->whereIn('id',array_column($Employee,'id'))->paginate(5);
              }else{
              //显示出所有,有班级的老师
					    $data['unallot']  = Employee::where(['school_id' => $user->school_id,'section_id' => 0])->paginate(10);
				   }
 			}else if ($func == Self::FUNC_TEACHER_ADD || $func == Self::FUNC_TEACHER_UPDATE) {
        //查询所有科目
        if ($func == Self::FUNC_TEACHER_ADD) {
          //这个学校的现任职务
          $dutys = Duty::where("parent_id",0)->get();
          $arr = array();
          foreach ($dutys as $duty) {
            array_push($arr,array("a" => $duty->title,"b" => array(Duty::where("parent_id",$duty->id)->pluck("title","id"))));
          }
          $duty = json_encode($arr,JSON_UNESCAPED_UNICODE);
          //这个学校的课程
          $course = json_encode(Course::get()->pluck('title','id'),JSON_UNESCAPED_UNICODE);
          //这个学校的班级
          $Classes = Classes::where(['school_id' => $user->school_id,"parent_id" => 0])->get();
          $arr = array();
          foreach ($Classes as $class) {
            array_push($arr,array("a" => $class->title,"b" => array(Classes::where("parent_id",$class->id)->pluck("title","id"))));
          }
          $class = json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
 				$data['employee'] = Employee::with('hasOneInfo')->whereHas('hasOneInfo')->find($parameter);
 				$data['employee']['hasOneInfo']->province = Region::find($data['employee']['hasOneInfo']->city)->name;
        $data['employee']['hasOneInfo']->cityName = Region::find($data['employee']['hasOneInfo']->city)->fullName;
        $data['employee']['hasOneInfo']->city = Region::find($data['employee']['hasOneInfo']->city)->id;
 			}
 		}else if($mod == Self::MOD_PRINCIPAL_FILE){
 			if($func == Self::FUNC_PRINCIPAL_LIST){

 			}
 		} 
 		return view('teacher.fileManager.fileManager', compact('mod','func','data','provinces','parameter','grade','user','course',"class","duty"));
 	}

 	//判断验证码与原密码是否一致
  public function updatePwd(){
  	$user = Auth::guard('employee')->user();
  	$input = Input::get();
  	if (Session::get('milkcaptcha') != $input['data']['code']) { 
  		$result = "201" ;
  	}else {
			if (Hash::check($input['data']['pwd'], $user->password)) {
				$newPwd = Employee::find($user->id);
        $newPwd->username = $input['data']['username'];
				$newPwd->password = bcrypt($input['data']['newPwd']);
				$result = $newPwd->save();
			}else{
				$result = false;
			}	
  	}
  	return json_encode($result);
  }
  //修改档案管理员的名称
  public function updateName(){
  	$user = Auth::guard('employee')->user();
  	$input = Input::get();
  	$employee = Employee::find($user->id);
  	$employee->name = $input['managerName'];
  	$result = $employee->save();
  	return json_encode($result);
  }
  //创建班级
  public function createClass(){
  	$input = Input::get();
  	$user = Auth::guard('employee')->user()->school_id;
  	$createClass = new Classes();
       	$createClass->parent_id = 0;
       	$createClass->title = $input['title'];
       	$createClass->school_id = $user;
       	$createClass->save();
       	return json_encode($createClass->id);
  }
  //创建年级
  public function createGrade(){
  	$input = Input::get();
  	$user = Auth::guard('employee')->user()->school_id;
  	$createClass = new Classes();
  	$createClass->parent_id = $input['id'];
  	$createClass->title = $input['title'];
  	$createClass->school_id = $user;
  	$createClass->save(); 
  }
	//城市
	public function province($id){
    	$city = Region::where('parent_id',$id)->get();
    	return json_encode($city);
    }
	//添加学生
	public function addStudent(){
		$user = Auth::guard('employee')->user()->school_id;
		$input = Input::get();
		$count = count($input['family_member']);
		try {
      DB::beginTransaction();
			 if (empty($input['id'])) {
            		$Student = new Student();
	        }else{
	    	    $Student = Student::find($input['id']);
	        }			
			$Student->name = $input['name'];
			$Student->school_id = $user;
			$Student->class_id = $input['class_id'];
			$Student->username = rand(100000000,999999999);
			$StudentResult = $Student->save();

			if (empty($input['id'])) {
				$StuInfo = new StuInfo();
				$StuInfo->student_id = $Student->id;
			}else{
				$StuInfo = StuInfo::where('student_id',$input['id'] )->first(['id']);
				$stuInfo = StuInfo::find($StuInfo->id);
			}
		    $StuInfo->nation = $input['nation'];
		    $StuInfo->gender = $input['gender'];
		    $StuInfo->formation = $input['formation'];
		    $StuInfo->city = $input['city'];
		    $StuInfo->birth_time = $input['birthTime'];
		    $StuInfo->idcade = $input['idcade'];
		    $StuInfo->bigHead = $input['bigHead'];
		    $StuInfo->politics_time = $input['politics_time'];
		    $StuInfo->headTeacher = $input['headTeacher'];
		    $StuInfo->phone = $input['phone'];
		    $StuInfo->add_time = time();
		    $StuInfoResult = $StuInfo->save();
		    for ($i=0; $i<$count; $i++) {
	    		if (empty($input['id'])) {
	    			$StuFamily = new StuFamily();
		    		$StuFamily->student_id = $Student->id;
	    		}else{
	    			$StuFamily = StuFamily::where('student_id',$input['id'])->get(['id']);
	    			$StuFamily = $StuFamily[$i];
	    			$StuFamily = StuFamily::find($StuFamily->id);
	    		}
		    	$StuFamily->family_address = $input['family_address'];
		    	$StuFamily->family_member = $input['family_member'][$i];
		    	$StuFamily->family_relation = $input['family_relation'][$i];
		    	$StuFamily->work_unit = $input['work_unit'][$i];
		    	$StuFamily->family_phone = $input['family_phone'][$i];
		    	$StudentFamily = $StuFamily->save();
		    }
		    if ($StudentResult  && $StuInfoResult && $StudentFamily) {
		    	DB::commit();
		    	if (empty($input['id'])) {
		    		$result = ['status' => 200, 'classes' => $input['class_id']];
		    	}else{
		    		$result = ['status' => 200, 'classes' => $input['class_id'], 'student_id' => $input['id']];
		    	}
		    		
		    }

		/*} catch(\SQLException $e){*/

    }catch(\Exception $e){
			DB::rollBack();
			if (empty($input['id'])) {
		    	$result = ['status' => 201, 'classes' => $input['class_id']];
	    	}else{
	    		$result = ['status' => 202, 'classes' => $input['class_id'], 'student_id' => $input['id']];
	    	}
		}
		return json_encode($result);
	}

	public function delStudent($id){
		$student = Student::find($id);
		DB::beginTransaction();
    try {
   		$stuInfo = StuInfo::where('student_id',$id)->delete();
   		$stuFamily = StuFamily::where('student_id',$id)->delete();
   		$delstudent = $student->delete();
     		if ($stuInfo && $stuFamily && $delstudent) {
            DB::commit();
     		}
      }catch(\Exception $e){
          DB::rollBack();
      }
 		return Redirect::to("/fileManager/student-file/student-list/$student->class_id");
	}

	public function resetPasswork($id){
        $student = Student::find($id);
        $student->password = '$2y$10$PK.xe3ZqE6A3SlJQANZgPefDshazeWYcttKoe9knkqKZIZNpAYD.u';
        $student->save();
        return Redirect::to('/fileManager/student-file/student-list');
    }

  //教师禁止与开启
  public function employeeStatus($id){
  	$employee = Employee::find($id);
  	if ($employee->status == 1) {
  		$employee->status = 0;
  		$employee->save();
  	}else{
  		$employee->status = 1;
  		$employee->save();
  	}
  	return Redirect::to('/fileManager/teacher-file/authorized-teacher');
  }
  //添加教师
	public function addTeacher(){
    $input = Input::get();
    DB::beginTransaction();
    try{
      //先赋予老师是否是班主任
      $employee = Employee::find($input['id']);
      $employee->Headmaster = $input['Headmaster'];
      $employee = $employee->save();

      //再添加详细信息
      $emInfo = EmInfo::where('employee_id',$input['id'])->first();
      $emInfo->graduation = $input['graduation'];
      $emInfo->graduation_time = $input['birthTime'];
      $emInfo->politics_time = $input['politics_time'];
      $emInfo->duty = $input['duty'];
      $emInfo->save();
      //添加职务  
    }catch(\Exception $e){
      DB::rollBack();
    }
  }
}	
