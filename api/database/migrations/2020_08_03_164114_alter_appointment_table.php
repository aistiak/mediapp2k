<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('appointments',function(Blueprint $table){
            $table->integer('user_id')->nullable();
            $table->date('date')->nullable();
            $table->string('type')->nullable();
            $table->integer('serial')->nullable();
            $table->tinyInteger('approved')->default(0);
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
