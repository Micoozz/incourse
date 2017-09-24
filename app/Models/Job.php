<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //

    const STATUS_UNPUB = 1;
    const STATUS_PUB = 2;
    const TYPE_PERSONAL = 1;
    const TYPE_FREE = 2;
    const TYPE_INTO = 3;


    protected $table = 'job';
    public $timestamps = false;

    public function hasManyWork(){
    	return $this->hasMany('App\Models\Work','job_id');
    }
}
