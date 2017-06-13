<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    const STATUS_OPEN = 1;
    const STATUS_CLOSE = 2;
    const STATUS_UNSUB = 3;

    protected $table = 'work';
    public $timestamps = false;

    public function belongsToJob(){
    	return $this->belongsTo('App\Models\Job');
    }
}
