<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('job_id');
            $table->integer('student_id');
            $table->integer('chapter_id')->nullable();
            $table->integer('course_id');
            $table->integer('score');
            $table->tinyinteger('status');
            $table->integer('start_time');
            $table->integer('sub_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('work');
    }
}
