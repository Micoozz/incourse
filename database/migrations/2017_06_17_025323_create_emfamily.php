<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmfamily extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('em_family', function(Blueprint $table)
        {
           $table->integer('employee_id');
           $table->string('family_address');
           $table->string('family_member');
           $table->string('family_relation');
           $table->string('work_address');
           $table->string('family_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('em_family');
    }
}
