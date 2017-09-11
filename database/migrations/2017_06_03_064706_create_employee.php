<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name',20);
            $table->integer('school_id');
            $table->string('username',20);
            $table->string('password',100);
/*            $table->integer('phone',11);
            $table->string('IDcard',20);
            $table->char('sex',1);*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employee');
    }
}
