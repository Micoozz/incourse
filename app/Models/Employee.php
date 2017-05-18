<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /*
    员工账户Model
     */
    protected $table = 'employee';
    public $timestamps = false;

    //关联员工个人信息Model 单条数据
    public function hasOneInfo(){
    	return $this->hasOne('App\Models\EmInfo');
    }
    //关联员工家庭情况Model 多条数据
    public function hasManyFamily(){
    	return $this->hasMany('App\Models\EmFamily');
    }
    //关联员工工作经历Model 多条数据
    public function hasManyOccupational(){
    	return $this->hasMany('App\Models\EmOccupational');
    }
}
