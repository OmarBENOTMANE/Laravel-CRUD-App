<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('employees')){
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->name();
            $table->phone();
            $table->email();
            $table->password();        
            $table->cv();
            $table->rememberToken();
            $table->timestamps();
        });}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
