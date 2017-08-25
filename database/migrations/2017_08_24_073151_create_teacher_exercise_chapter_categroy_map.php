<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherExerciseChapterCategroyMap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_exercise_chapter_categroy_map', function(Blueprint $table)
        {
            $table->increments("id");
            $table->integer("teacher_id");
            $table->integer("exercise_id");
            $table->integer("grade_id");
            $table->integer("unit_id");
            $table->integer("section_id");
            $table->integer("categroy_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teacher_exercise_chapter_categroy_map');
    }
}
