<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmInfo extends Model
{
    /*
    员工个人信息Model
     */
    protected $table = 'em_info';
    public $timestamps = false;

    //从属于员工账户Model
    public function belongsToEmployee(){
    	return $this->belongsTo('App\Models\Employee');
    }
}
