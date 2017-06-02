<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class School extends Authenticatable
{
    //学校账户Model
    protected $table = 'school';
    public $timestamps = false;
}
