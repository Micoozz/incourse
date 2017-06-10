<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('teacher_id')->nullable();
            $table->integer('chapter_id')->nullable();
            $table->integer('course_id');
            $table->tinyinteger('job_type');
            $table->integer('score');
            $table->tinyinteger('status');
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
        //
    }
}
