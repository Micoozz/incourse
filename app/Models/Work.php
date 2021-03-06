<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    const STATUS_OPEN = 1;
    const STATUS_SUB = 2;
    const STATUS_CORRECTING = 3;
    const STATUS_CORRECT_DONE = 4;

    public $timestamps = false;

    public function belongsToJob(){
    	return $this->belongsTo(Job::class, 'job_id');
    }

/*    public function belongsToCourse(){
    	return $this->belongsTo('App\Models\Course','course_id');
    }*/
}
