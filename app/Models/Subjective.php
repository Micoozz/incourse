<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjective extends Model
{
    //
    protected $table = 'subjectives';
    public $timestamps = false;
    protected $fillable = ['subject'];

    public function belongsToExercises(){
    	return $this->belongsTo('App\Models\Exercises','exe_id','id');
    }
}
