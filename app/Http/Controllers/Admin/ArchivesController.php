<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Student;
use App\Models\EmInfo;
use App\Models\EmFamily;
use App\Models\EmOccupational;

use Auth;
use Input;

class ArchivesController extends Controller
{
    /*
    档案管理控制器
     */
    //获取员工列表 GET请求
    public function showEmployeeList($page = 1){
        $limit = ($page-1)*10;
        $employee_all = Employee::all();
        $pageLength = intval($employee_all->count()/10)+1;
        $employee_list = Employee::skip($limit)->take(10)->get();
        $data = array('total' => $employee_all->count(),'pageLength' => $pageLength,'employee' => array());
        foreach ($employee_list as $employee) {
            $employee = Employee::find($employee->id);
            array_push($data['employee'],array(
                'id' => $employee->id,
                'name' => $employee->name,
                'school_id' => $employee->school_id,
                'duty' => $employee->duty,
                'department' => $employee->department));
        }
    	return json_encode($data);
    }
    //获取单个员工信息 GET请求
    public function showEmployeeDetail($id){
        $employee_info = Employee::find($id);
        $data['employee_info'] = EmInfo::where('employee_id',$employee_info->id)->get()->toArray();
        $data['employee_family'] = EmFamily::where('employee_id',$employee_info->id)->get()->toArray();
        $data['employee_emoccupational'] = EmOccupational::where('employee_id',$employee_info->id)->get()->toArray();
        return json_encode($data);  
    }
    //新增员工接口 POST请求
    public function createEmployee(){
    	$input = Input::get();
    	$employee = new Employee;
    	$employee->name = $input['name'];
        $employee->school_id = Auth::guard('school')->user()->school_id;
        $employee->duty = $input['duty'];
        $employee->department = $input['department'];
        $employee->sex = $input['sex'];
        $employee->phone = $input['phone'];
        $employee->IDcard = $input['IDcard'];
        $employee->save();

        $employee_id = $employee->id;

        $employee_info = new EmInfo;
        $employee_info->employee_id = $employee_id;
        $employee_info->native_place = $input['native_place'];
        $employee_info->nation = $input['nation'];
        $employee_info->census = $input['census'];
        $employee_info->birth = strtotime($input['birth']);
        $employee_info->tch_workingAge = $input['tch_workingAge'];
        $employee_info->tch_qualification = $input['tch_qualification'];
        $employee_info->tch_duty = $input['tch_duty'];
        $employee_info->tch_backbone = $input['tch_backbone'];
        $employee_info->arrival_time = strtotime($input['arrival_time']);
        $employee_info->positive_time = strtotime($input['positive_time']);
        $employee_info->party_time = strtotime($input['party_time']);
        $employee_info->graduate_time = strtotime($input['graduate_time']);
        $employee_info->politics = $input['politics'];
        $employee_info->schoolTag = $input['schoolTag'];
        $employee_info->education = $input['education'];
        $employee_info->specialty = $input['specialty'];
        $employee_info->remark = $input['remark'];
        $employee_info->save();

        $employee_family = new EmFamily;
        $employee_family->employee_id = $employee_id;
        $employee_family->family_address = $input['family_address'];
        $employee_family->family_member = $input['family_member'];
        $employee_family->family_relation = $input['family_relation'];
        $employee_family->work_unit = $input['work_unit'];
        $employee_family->family_phone = $input['family_phone'];
        $employee_family->save();

        $employee_emoccupational = new EmOccupational;
        $employee_emoccupational->employee_id = $employee_id;
        $employee_emoccupational->engage_academy = $input['engage_academy'];
        $employee_emoccupational->prove_phone = $input['prove_phone'];
        $employee_emoccupational->word_start_time = strtotime($input['word_start_time']);
        $employee_emoccupational->word_end_time = strtotime($input['word_end_time']);
        $employee_emoccupational->remark = $input['remark'];
        $employee_family->save();
    }
    //删除员工接口 GET请求
    public function deleteEmployee($id){
    	$employee = Employee::destroy($id);
    }
    //获取学生列表 GET请求
    public function showStudentList($page =1 ){
    	$limit = ($page-1)*10;
        $student_all = student::all();
        $pageLength = intval($student_all->count()/10)+1;
        $student_list = student::skip($limit)->take(10)->get();
        $data = array('total' => $student_all->count(),'pageLength' => $pageLength,'student' => array());
        foreach ($student_list as $student) {
            $student = Student::find($student->id);
            array_push($data['student'],array(
                'id' => $student->id,
                'name' => $student->name,
                'stu_number' => $student->stu_number,
                'class' => '一班',
                'grade' => '一年级'));
        }
        return json_encode($data);
    }
    //获取单个学生信息 GET请求
    public function showStudent($id){
    	$student = Student::find($id);
    	return $student;
    }
    //新增学生接口 POST请求
    public function createStudent(){
    	$input = Input::get();
    	$student = new Student;
    	$student->name = $input->name;
    	$student->school_id = Auth::guard('school')->user()->school_id;
    	$student->username = $input->username;
    	$student->password = bcrypt($input->password);
    	$student->save();
    }
    //删除学生接口 GET请求
    public function deleteStudent($id){
    	$student = Student::find($id);
    	$student->delete();
    }
}
