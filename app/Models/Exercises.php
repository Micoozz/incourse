<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercises extends Model
{
    //
    const CATE_RADIO = 1;
    const CATE_CHOOSE = 2;
    const CATE_FILL = 3;
    const CATE_JUDGE = 4;
    const CATE_LINE = 5;
    const CATE_SORT = 6;
    const CATE_COMPUTE = 9;
    const CATE_SHORT = 10;
    const CATE_ANSWER = 11;
    // const CATE_COMPOSITIVE = 10;

    const TYPE_OBJECTIVE = 1;//客观题
    const TYPE_SUBJECTIVE = 2;//主观题
    const TYPE_COMPOSITIVE = 3;//综合题

    protected $table = 'exercises';
    public $timestamps = false;

    public function hasOneCompositive(){
    	return $this->hasOne('App\Models\Compositive','exe_id');
    }
    public function hasManyObjective(){
    	return $this->hasMany('App\Models\Objective','exe_id');
    }
    public function hasManySubjective(){
    	return $this->hasMany('App\Models\Subjective','exe_id');
    }
}
