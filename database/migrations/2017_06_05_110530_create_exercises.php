<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('teacher_id')->nullable();
            $table->integer('school_id');
            $table->integer('chapter_id')->nullable();
            $table->integer('course_id');
            $table->tinyinteger('exe_type');
            $table->smallInteger('score');
            $table->integer('categroy_id');
            $table->integer('updata_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exercises');
    }
}
