<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    //学生账户Model
    public $timestamps = false;

      //关联学生个人信息Model 单条数据
    public function hasOnestu_Info(){
    	return $this->hasOne('App\Models\StuInfo');
    }
    //关联学生家庭情况Model 多条数据
    public function hasManystu_Family(){
    	return $this->hasMany('App\Models\StuFamily');
    }
    //关联学生奖惩Model 多条数据
    public function hasManyRewardPunishment(){
    	return $this->hasMany('App\Models\StuRewardPunishment');
    }
    //关联学生评价Mode 多条数据
    public function hasManyEvaluate(){
    	return $this->hasMany('App\Models\StuEvaluate');
    }
}
