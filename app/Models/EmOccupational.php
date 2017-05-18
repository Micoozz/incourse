<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmOccupational extends Model
{
    /*
    员工工作经历Model
     */
    protected $table = 'em_occupational';
    public $timestamps = false;

    //从属于员工账户Model
    public function belongsToEmployee(){
    	return $this->belongsTo('App\Models\Employee');
    }
}
