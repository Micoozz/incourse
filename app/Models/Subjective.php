<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjective extends Model
{
    //
    protected $table = 'subjective';
    public $timestamps = false;

    public function belongsToExercises(){
    	return $this->belongsTo('App\Models\Exercises','exe_id');
    }
}
