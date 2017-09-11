<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Region;
use App\Models\Employee;
use App\Models\EmInfo;
use App\Models\Group;
use App\Models\Section;
use Validator;
use Input;
use Auth;
use Hash;
use Searchy;
use Session;
use Cookie;
use DB;
use Redirect;


class ArchivesController extends Controller
{
	//管理功能列表
	const FUNC_MANAGER_PWD = 'manager-pwd';
	const FUNC_MANAGER_ADDRESS = 'manager-address';
	const FUNC_MANAGER_LIST = 'manager-list';
	const FUNC_MANAGER_UPDATEPWD = 'manager-updatepwd'; //返回退到修改密码页面，
	const FUNC_MANAGER_ADD_EMPLOYEE = 'add-employee';
	const FUNC_MANAGER_INFO = 'manager-info';
    const FUNC_MANAGER_NAVIGSTION = 'manager-navigstion';
    //权限功能页面
    const FUNC_PERMISSIONS_PAGE = 'permissions-page';
    const FUNC_PERMISSIONS_ALLOCATION = 'permissions-allocation';
	//板块列表
	const MOD_MANAGER_ARCHIVES = 'manager-archives';
	const MOD_PERMISSIONS = 'permissions';
    public function adminArchives($mod = 'manager-archives', $func = 'manager-list',$parameter = null)
    {
    	$user = Auth::guard('school')->user();
    	if ($mod == Self::MOD_MANAGER_ARCHIVES) {
	    	//管理板块
            if (Hash::check('123456', $user->password)){  
                $func = Self::FUNC_MANAGER_PWD;
            }else{
                if(!empty($user->email)){
                    if ($func == Self::FUNC_MANAGER_ADDRESS) {
                        $provinces = Region::where('type',1)->get();
                    }elseif ($func == Self::FUNC_MANAGER_LIST){
                        $data['employees'] = Employee::where('school_id',$user->id)->with('hasOneInfo')->whereHas('hasOneInfo')->paginate(5);
                        $data['count'] = count($data['employees']);
                        if (!empty($parameter)) {
                            $Employee = Searchy::driver('ufuzzy')->Employee('name')->query($parameter)->get()->toArray();
                            $data['employees'] = Employee::where('school_id',$user->id)->whereIn('id',array_column($Employee, 'id'))->paginate(5);
                        }
                    }elseif ($func == Self::FUNC_MANAGER_UPDATEPWD) {
                    //返回退到修改密码页面，或自己想要修改密码
                    }elseif ($func == Self::FUNC_MANAGER_ADD_EMPLOYEE) {
                        if (!empty($parameter)) {
                            $data['employee'] = Employee::with('hasOneInfo')->whereHas('hasOneInfo')->find($parameter);
                            $data['employee']['hasOneInfo']->province = Region::find($data['employee']['hasOneInfo']->city)->name;
                            $data['employee']['hasOneInfo']->cityName = Region::find($data['employee']['hasOneInfo']->city)->fullName;
                            $data['employee']['hasOneInfo']->city = Region::find($data['employee']['hasOneInfo']->city)->id;
                        }
                        $provinces = Region::where('type',1)->get();
                    }elseif ($func == Self::FUNC_MANAGER_INFO) {
                        $data['employee'] = Employee::with('hasOneInfo')->whereHas('hasOneInfo')->find($parameter);
                        $data['employee']['hasOneInfo']->province = Region::find($data['employee']['hasOneInfo']->city)->name;
                        $data['employee']['hasOneInfo']->city = Region::find($data['employee']['hasOneInfo']->city)->fullName;
                    }elseif($func == Self::FUNC_MANAGER_NAVIGSTION){
                        $user->email = $parameter;
                        $user->save();
                    }/*else{
                        if (empty($user->email)) {
                            $func = Self::FUNC_MANAGER_ADDRESS;
                            $provinces = Region::where('type',1)->get();
                        }else{
                            $func = Self::FUNC_MANAGER_LIST;
                            $data['employees'] = Employee::where('school_id',$user->id)->with('hasOneInfo')->whereHas('hasOneInfo')->paginate(5);
                            $data['count'] = count($data['employees']);
                        }
                    }*/
                }else{
                    $func = Self::FUNC_MANAGER_ADDRESS;
                    $provinces = Region::where('type',1)->get();
                }    
            }
		}elseif ($mod == Self:: MOD_PERMISSIONS) {
            $data['employees'] = Employee::where('school_id',$user->id)->get()->toArray();
            $data['count'] = count($data['employees']);
            if ($parameter) {
                $data['employees'] = Searchy::driver('ufuzzy')->Employee('name')->query($parameter)->get()->toArray();
                $data['employees'] = Employee::where('school_id',$user->id)->whereIn('id',array_column($data['employees'], 'id'))->get()->toArray();
            }
            $data['groups'] = Group::where('school_id',$user->id)->orwhere('school_id',0)->get()->toArray();
            if (empty($data['count'])) {
                $func = Self::FUNC_PERMISSIONS_PAGE;
            }else{
                $func = Self::FUNC_PERMISSIONS_ALLOCATION;
                $data['guidance'] = Employee::where('school_id',$user->id)->select('section_id')->where('section_id','>',0)->get()->toArray();
                $data['Section'] = Section::get();
                $data['employeeRole'] = Employee::where('school_id',$user->id)->get();
            }
        }
        return view('school.archives',compact('func','mod','provinces','data','user'));
    }
    //判断验证码与原密码是否一致
    public function updatePwd(){
    	$user = Auth::guard('school')->user();
    	$input = Input::get();
    	if (Session::get('milkcaptcha') != $input['data']['code']) { 
    		$result = 201 ;
    	}else {
			if (Hash::check($input['data']['pwd'], $user->password)) {
				$newPwd = School::find($user->id);
                $newPwd->username = $input['data']['username'];
				$newPwd->password = bcrypt($input['data']['newPwd']);
				$result = $newPwd->save();
			}else{
				$result = false;
			}	
    	}
    	return json_encode($result);
    }
    //地址
    public function province($id)
    {
    	$city = Region::where('parent_id',$id)->get();
    	return json_encode($city);
    }
    //验证码
   
    //添加职员
    public function addAdmin(Request $request){
        $user = Auth::guard('school')->user()->id;
    	$input = Input::get();
        $info = [
            'name.required' => '用户名不能为空',
            'nation.required' => '民族不能为空',
            'city.required' => '省市不能为空',
            'birth_time.required' => '出生年月不能为空',
            'bigHead.required' => '头像不能为空',
            'idCode.required' => '身份证不能为空',
            'idCode.unique' => '身份证已存在',
        ];
        $validator = Validator::make($input,[
            'name' => 'required',
            'nation' => 'required',
            'city' => 'required',
            'birth_time' => 'required',
            'bigHead' => 'required',
            'idCode' => 'required|unique:em_info',
             ],$info);
        if ($validator->fails()) {
            return $validator->errors()->first();
        }else{
            DB::beginTransaction();
            try {
                if (empty($input['id'])) {
                    $Employee = new Employee();
                }else{
            	    $Employee = Employee::find($input['id']);
                }
                $Employee->username = rand(100000000,999999999);
            	$Employee->name = $input['name'];
            	$Employee->school_id = $user;
            	$Employee->section_id = 0;
            	$employeeResult = $Employee->save(); 
                if (empty($input['id'])) {
                    $EmInfo = new EmInfo();
                }else{
                    $EmInfo = EmInfo::where('employee_id',$input['id'])->first();
                }
                $EmInfo->employee_id = $Employee->id;
                $EmInfo->nation = $input['nation'];
                $EmInfo->gender = $input['gender'];
                $EmInfo->formation = $input['formation'];
                $EmInfo->city = $input['city'];//城市
                $EmInfo->birth_time = strtotime($input['birth_time']);
                $EmInfo->idcode = $input['idCode'];
                $EmInfo->bigHead = $input['bigHead'];
                $EmInfo->add_time = time();
                $emInfoResult = $EmInfo->save();
                if ($employeeResult && $emInfoResult) {
                    DB::commit();
                   $result = 200;
                }
            }catch(\Exception $e){
                DB::rollBack();
                $result = 201;
            }
            return json_encode($result);
        }      	
 	} 
    //打开权限与关闭权限
 	public function forbid($id,$status){
 		$Employee = Employee::find($id);
        if ($status == 1) {
            $Employee->status = 0;
        }else{
 		     $Employee->status = 1;
        }
 		$result = $Employee->save();
 		if ($result) {
 			return json_encode($result);
 		}
 	}
    //删除职员
 	public function delEmployee($id){
        DB::beginTransaction();
        try {
 		$eminfo = EmInfo::where('employee_id',$id)->delete();
 		$employee = Employee::find($id)->delete();
     		if ($eminfo && $employee) {
                DB::commit();
     			$result = 200;
     		}
        }catch(\Exception $e){
            DB::rollBack();
            $result = 201;
        }
 		return json_encode($result);
 	}
    //分配权限
    public function manageRole($role,$employee_id){
        $employee =  Employee::find($employee_id);
        $employee->section_id = $role;
        $employee->group_id = 0;
        $result = $employee->save();
        if ($result) {
            return json_encode($result);
        }
    }
    //人员拖动
    public function manageGroup($gruop,$employee){
        $employee =  Employee::find($employee);
        $employee->group_id = $gruop;
        $employee->section_id = 0;
        $result = $employee->save();
        if ($result) {
            return json_encode($result);
        }
    }
    //重命名分组
    public function rechristen($id,$title){
        $rechristen = Group::find($id);
        $rechristen->title = $title;
        $result = $rechristen->save();
        if ($result) {
            return json_encode($result);
        }
    }
    //添加分组
    public function addGroup($group_id,$title){
        $addGroup = new Group();
        $addGroup->parent_id = $group_id;
        $addGroup->title = $title;
        $addGroup->school_id = Auth::guard('school')->user()->id;
        $result =  $addGroup->save();
        if ($result) {
            return json_encode($addGroup->id);
        }
    }
    //删除分组 有子分组一同删除并把里面的人员，转到默认页面
    public function delGroup($group_id){
        $delGroup_parent = Group::where("parent_id",$group_id)->get();
        if ($delGroup_parent) {
            foreach ($delGroup_parent as $delGroup) {
                $Group_childs = Employee::where('group_id',$delGroup->id)->get();
                foreach ($Group_childs as $Group_child) {
                    $Group_child = Employee::find($Group_child->id);
                    $Group_child->group_id = 1;
                    $Group_child->save();
                }
            }
        }
        $delGroup_parent = Group::where("parent_id",$group_id)->delete();
        $delGroup = Group::find($group_id)->delete();
           $employees = Employee::where('group_id',$group_id)->get();
           if ($employees) {
               foreach ($employees as $employee) {
               $employee = Employee::find($employee->id);
               $employee->group_id = 1;
               $employee->save();
           }  
        }
    }
    public function resetPassEmployee($id){
        $employee = Employee::find($id);
        $employee->password = '$2y$10$PK.xe3ZqE6A3SlJQANZgPefDshazeWYcttKoe9knkqKZIZNpAYD.u';
        $employee->save();
        return Redirect::to('/adminArchives/manager-archives/manager-list');
    }
}
