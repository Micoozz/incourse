<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Student;
use App\Models\EmInfo;
use App\Models\EmFamily;
use App\Models\EmOccupational;
use App\Models\StuEvaluate;
use App\Models\StuFamily;
use App\Models\StuRewardPunishment;
use App\Models\StuInfo;
use App\Models\Section;
use App\Models\school;

use Auth;
use Input;

class ArchivesController extends Controller
{
     //获取员工列表 GET请求
    public function showEmployeeList($page = 1){
        $limit = ($page-1)*10;
        $employee_all = Employee::all();
        $pageLength = intval($employee_all->count()/10)+1;
        if (Input::get()) {
             $employee_list = Employee::where('name','like','%'.$input['name'].'%')->skip($limit)->take(10)->get();
        }else{
             $employee_list = Employee::skip($limit)->take(10)->get();
        }
        $data = array('total' => $employee_all->count(),'pageLength' => $pageLength,'employee' => array());
        foreach ($employee_list as $employee) {
            $employee = Employee::find($employee->id);
            array_push($data['employee'],array(
                'id' => $employee->id,
                'name' => $employee->name,
                'school_id' => $employee->school_id,
                'duty_id' => $employee->duty_id,
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
        $employee->phone = $input['phone'];
        $employee->save();

        $employee_id = $employee->id;

        if ($employee['info']) {
            $employee_info = new EmInfo;
            $employee['info']->employee_id = $employee_id;
            $employee['info']->native_place = $input['native_place'];
            $employee['info']->nation = $input['nation'];
            $employee['info']->census = $input['census'];
            $employee['info']->birth = strtotime($input['birth']);
            $employee['info']->tch_workingAge = $input['tch_workingAge'];
            $employee['info']->tch_qualification = $input['tch_qualification'];
            $employee['info']->tch_duty = $input['tch_duty'];
            $employee['info']->tch_backbone = $input['tch_backbone'];
            $employee['info']->arrival_time = strtotime($input['arrival_time']);
            $employee['info']->positive_time = strtotime($input['positive_time']);
            $employee['info']->party_time = strtotime($input['party_time']);
            $employee['info']->graduate_time = strtotime($input['graduate_time']);
            $employee['info']->politics = $input['politics'];
            $employee['info']->schoolTag = $input['schoolTag'];
            $employee['info']->education = $input['education'];
            $employee['info']->specialty = $input['specialty'];
            $employee['info']->sex = $input['sex'];
            $employee['info']->IDcard = $input['IDcard'];
            $employee['info']->remark = $input['remark'];
            $employee['info']->save();
        }

        if ($employee['family']) {
            $employee['family'] = new EmFamily;
            $employee['family']->employee_id = $employee_id;
            $employee['family']->family_address = $input['family_address'];
            $employee['family']->family_member = $input['family_member'];
            $employee['family']->family_relation = $input['family_relation'];
            $employee['family']->work_unit = $input['work_unit'];
            $employee['family']->family_phone = $input['family_phone'];
            $employee['family']->save();
        }
        if ($employee['emoccupational']) {
            $employee['emoccupational'] = new EmOccupational;
            $employee['emoccupational']->employee_id = $employee_id;
            $employee['emoccupational']->engage_academy = $input['engage_academy'];
            $employee['emoccupational']->prove_phone = $input['prove_phone'];
            $employee['emoccupational']->word_start_time = strtotime($input['word_start_time']);
            $employee['emoccupational']->word_end_time = strtotime($input['word_end_time']);
            $employee['emoccupational']->remark = $input['remark'];
            $employee['emoccupational']->save();
        }
       
    }
    //删除员工接口 GET请求
    private function deleteEmployeeInfo($id){
       if ($this->hasOneInfo()) {
            $this->hasOneInfo()->destory($id);
        }

        if ($this->hasManyFamily()) {
            StuFamily::where('employee_id',$id)->destory($id);
        }

        if ($this->hasManyOccupational()) {
            EmOccupational::where('employee_id',$id)->destory();
        }

        $this->delete();
    }
     
    public function deleteEmployee(){
        $deleteEmployee = Input::get();
        foreach ($deleteEmployee as $id) {
            $employee = Employee::find($id);
            $employee->deleteEmployeeInfo();
        }
    }
    //Emloyee条件筛选
    public function filtrateEmloyee(){
       if ($input = Input::get()){
           $filtrateEmployee = Employee::where(['section_id' => $input['section_id'],'cource_id' => $input['cource_id'],'class_id' => $input['class_id'],'grade_id' => 
            $input['grade_id']])->get();
       }else{
            $filtrateEmloyee = Employee::select('section_id','cource_id','class_id','grade_id')->get();
        }
        return json_encode($filtrateEmployee);
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
        $student_info = Student::find($id);
        $data['student_info'] = StuInfo::where('student_id',$student_info->id)->get();
        $data['student_family'] = StuFamily::where('student_id',$student_info->id)->get();
        $data['student_reward_punishment'] = StuRewardPunishment::where('student_id',$student_info->id)->get();
        $data['student_evaluate'] = StuEvaluate::where('student_id',$student_info->id)->get();
        return json_encode($data);
    }
    //新增学生接口 POST请求
    public function createStudent(){
        $input = Input::get();
        $student = new Student;
        $student->name = $input['name'];
        $student->school_id = Auth::guard('school')->user()->school_id;
        $student->class_id = $input['class_id'];
        $student->username = $input['username'];
        $student->password = crypt($input['password']);
        $student->stu_number = $input['stu_number'];
        $student->save();

         $student_id = $student->id;

        if ($student['info']) {
            $student['info'] = new StuInfo;
            $student['info']->student_id = $student_id;
            $student['info']->native_place = $input['native_place'];
            $student['info']->nastion = $input['nastion'];
            $student['info']->census = $input['census'];
            $student['info']->birth = $input['birth'];
            $student['info']->sex = $input['sex'];
            $student['info']->IDcard = $input['IDcard'];
            $student['info']->class_id = $input['class_id'];
            $student['info']->employee_id = $input['employee_id'];
            $student['info']->politics = $input['politics'];
            $student['info']->add_time = $input['add_time'];
            $student['info']->scholl_roll = $input['school_roll'];
            $student['info']->remark = $input['remark'];
            $student['info']->save();
        }

        if ($student['family']) {
            $student['family'] = new StuFamily;
            $student['family']->student_id = $student_id;
            $student['family']->family_address = $input['family_address'];
            $student['family']->family_member = $input['StuFamily'];
            $student['family']->family_relation = $input['family_relation'];
            $student['family']->work_unit = $input['work_unit'];
            $student['family']->family_phone = $input['family_phone'];
            $student['family']->save();
        }

        if ($student['reward_punishment']) {
            $student['reward_punishment'] = new StuRewardPunishment;
            $student['reward_punishment']->student_id = $student_id;
            $student['reward_punishment']->reward_punishment = $input['reward_punishment'];
            $student['reward_punishment']->happen_time = $input['happen_time'];
            $student['reward_punishment']->content = $input['content'];
            $student['reward_punishment']->save();
        }

        if ($student['evaluate']) {
            $student['evaluate'] = new StuEvaluate;
            $student['evaluate']->student_id = $student_id;
            $student['evaluate']->semester_time = $input['semester_time'];
            $student['evaluate']->appraiser = $input['appraiser'];
            $student['evaluate']->content = $input['content'];
            $student['evaluate']->save();
        }
    }
    //删除学生接口 GET请求
    private function deleteStudentInfo() {
        if ($this->hasOnestu_Info()) {
            $this->hasOnestu_Info()->destory($id);
        }
        if ($this->hasManystu_Family()) {
            StuFamily::where('student_id',$id)->destory($id);
        }
        if ($this->hasManyRewardPunishment()) {
            StuRewardPunishment::where('student_id',$id)->destory();
        }
        if ($this->hasManyEvaluate()) {
           StuEvaluate::where('student_id',$id)->destory($id);
        }
        $this->delete();
    }
    public function deleteStudent(){
        $deleteStudent = Input::get();
        foreach ($deleteStudent as $id) {
            $student = Student::find($id);
            $student->deleteStudentInfo();
        }
    }
    //student学生筛选条件
    public function filtrateStudent(){
        if ($input = Input::get()) {
           $filtrateStudent = Student::where([
            'class_id' => $input['class_id'],
            'grade_id' => $input['grade_id']])->get();
       }else{
            $filtrateStudent = Student::select('class_id','grade_id')->get();
        }
        return json_encode($filtrateStudent);
    }
    //获取管理员个人信息
    public function manageInfo(){
        $manageInfo = School::where('id',Auth::guard('school')->user()->id)->get();
        dd($manageInfo);
        return json_encode($manageInfo);
    }

}