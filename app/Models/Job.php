<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    use Searchable;

    const STATUS_UNPUB = 1;
    const STATUS_JOB = 1;
    const STATUS_PUB = 2;
    const TYPE_PERSONAL = 1;
    const TYPE_FREE = 2;
    const TYPE_INTO = 3;
    const TYPE_JOB = 1;


    protected $table = 'job';
    public $timestamps = false;

    public function hasManyWork(){
    	return $this->hasMany('App\Models\Work','job_id');
    }
}
