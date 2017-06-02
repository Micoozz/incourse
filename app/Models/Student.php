<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    //学生账户Model
    protected $table = 'student';
    public $timestamps = false;
}
