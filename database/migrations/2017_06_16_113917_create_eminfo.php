<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEminfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('em_info', function(Blueprint $table)
        {
            $table->integer('employee_id');
            $table->string('native_place',50);
            $table->string('nation',50);
            $table->string('census',50);
            $table->integer('birth');
            $table->integer('tch_workingAge');
            $table->string('tch_qualification',20);
            $table->string('tch_duty',20);
            $table->string('tch_backbone',20);
            $table->integer('arrival_time');
            $table->integer('positive_time');
            $table->integer('party_time');
            $table->integer('graduate_time');
            $table->string('politics',20);
            $table->string('schoolTag',20);
            $table->string('education',20);
            $table->string('specialty',20);
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
          Schema::drop('em_info');
    }
}
