<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compositive extends Model
{
    //
    protected $table = 'compositive';
    public $timestamps = false;
    protected $fillable = ['content'];
    
    public function belongsToExercises(){
    	return $this->belongsTo('App\Models\Exercises','exe_id');
    }
}
