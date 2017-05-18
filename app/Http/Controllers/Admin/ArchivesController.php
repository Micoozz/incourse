<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Employee;
use App\Http\Models\Student;
use Auth;

class ArchivesController extends Controller
{
    /*
    档案管理控制器
     */
    //获取员工列表 GET请求
    public function showEmployeeList(){
    	$employee_list = Employee::all();
    	return $employee_list;
    }
    //获取单个员工信息 GET请求
    public function showEmployee($id){
    	$employee = Employee::find($id);
    	return $employee;
    }
    //新增员工接口 POST请求
    public function createEmployee(){
    	$input = Input::get();
    	$employee = new Employee;
    	$employee->name = $input->name;
    	$employee->school_id = Auth::guard('school')->user()->school_id;
    	$employee->username = $input->username;
    	$employee->password = bcrypt($input->password);
    	$employee->save();
    	$employee->hasOneInfo()->create($input->info);
    }
    //删除员工接口 GET请求
    public function deleteEmployee($id){
    	$employee = Employee::find($id);
    	$employee->delete();
    }
    //获取学生列表 GET请求
    public function showStudentList(){
    	$student_list = Student::all();
    	return $student_list;
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
