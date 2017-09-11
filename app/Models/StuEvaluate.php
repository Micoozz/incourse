<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StuEvaluate extends Model
{
    /*
    员工个人信息Model
     */
    protected $table = 'stu_evaluate';
    public $timestamps = false;

    //从属于员工账户Model
    public function belongsToEmployee(){
    	return $this->belongsTo('App\Models\Student');
    }
}
