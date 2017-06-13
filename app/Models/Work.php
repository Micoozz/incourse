<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $table = 'work';
    public $timestamps = false;

    public function belongsToJob(){
    	return $this->belongsTo('App\Models\Job','job_id');
    }
}
