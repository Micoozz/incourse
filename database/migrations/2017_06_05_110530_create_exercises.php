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
            $table->integer('teacher_id')->default(null);
            $table->integer('school_id');
            $table->integer('chapter_id')->default(null);
            $table->integer('course_id');
            $table->tinyinteger('exe_type');
            $table->integer('score',3);
            $table->integer('categroy_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
