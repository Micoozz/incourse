<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercises extends Model
{
    //
    const CATE_SHORT = 1; //简答题
    const CATE_RADIO = 2;//单选题
    const CATE_FILLS = 3;//多空题
    const CATE_CHOOSE = 4;//多选题
    const CATE_DRAWING = 5;//画图题
    const CATE_LINE = 6;//连线题
    const CATE_SORT = 7;//排序题
    const CATE_JUDGE = 8;//判断题
    const CATE_FILL = 9;//填空题
    const CATE_COMPOSITIVE = 10;//综合题

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
