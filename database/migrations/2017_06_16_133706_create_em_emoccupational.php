<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmEmoccupational extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('em_emoccupational', function(Blueprint $table)
        {
           $table->integer('employee_id');
           $table->string('engage_academy');
           $table->string('prove_phone');
           $table->integer('word_start_time');
           $table->integer('word_end_time');
           $table->text('remark');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('em_emoccupational');
    }
}
