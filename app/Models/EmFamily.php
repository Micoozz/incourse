<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmFamily extends Model
{
    /*
    员工家庭情况Model
     */
    protected $table = 'em_family';
    public $timestamps = false;

    //从属于员工账户Model
    public function belongsToEmployee(){
    	return $this->belongsTo('App\Models\Employee');
    }
}
