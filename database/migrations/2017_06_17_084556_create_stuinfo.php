<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stu_info',function(Blueprint $table){
            $table->integer('student_id');
            $table->string('native_place',20);
            $table->string('nastion',20);
            $table->string('census',20);
            $table->integer('birth');
            $table->integer('class_id');
            $table->integer('employee_id');
            $table->string('politics');
            $table->integer('add_time');
            $table->integer('school_roll');
            $table->string('remark',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stu_info');
    }
}
