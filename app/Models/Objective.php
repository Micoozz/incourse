<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    //
    protected $table = 'objective';
    public $timestamps = false;
    protected $fillable = ['subject','option','answer'];

    public function belongsToExercises(){
    	return $this->belongsTo('App\Models\Exercises','exe_id');
    }
}
