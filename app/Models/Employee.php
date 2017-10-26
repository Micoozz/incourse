<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    /*
    员工账户Model
     */
    public $timestamps = false;

    //关联员工个人信息Model 单条数据
    public function hasOneInfo(){
    	return $this->hasOne('App\Models\EmInfo','employee_id');
    }
    //关联员工家庭情况Model 多条数据
    public function hasManyFamily(){
    	return $this->hasMany('App\Models\EmFamily');
    }
    //关联员工工作经历Model 多条数据
    public function hasManyOccupational(){
    	return $this->hasMany('App\Models\EmOccupational');
    }
    public function searchableAs()
    {
        return 'employees_index';
    }
    //关联老师的课程，所在班级
   /* public function hasManyMap(){
        return $this->hasMany('App\Models\EmFamily');
    }*/
}
