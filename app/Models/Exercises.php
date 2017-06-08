<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercises extends Model
{
    //
    const CATE_SHORT = 1;
    const CATE_RADIO = 2;
    const CATE_FILLS = 3;
    const CATE_CHOOSE = 4;
    const CATE_DRAWING = 5;
    const CATE_LINE = 6;
    const CATE_SORT = 7;
    const CATE_JUDGE = 8;
    const CATE_FILL = 9;
    const CATE_COMPOSITIVE = 10;

    const TYPE_OBJECTIVE = 1;//客观题
    const TYPE_SUBJECTIVE = 2;//主观题
    const TYPE_COMPOSITIVE = 3;//综合题

    protected $table = 'exercises';
    public $timestamps = false;

    public function hasOneCompositive(){
    	return $this->hasOne('App\Models\Compositive');
    }
    public function hasManyObjective(){
    	return $this->hasMany('App\Models\Objective');
    }
    public function hasManySubjective(){
    	return $this->hasMany('App\Models\Subjective');
    }
}
