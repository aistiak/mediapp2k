<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsEnableCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('hospitals',function(Blueprint $table){
            $table->tinyInteger('is_enable')->default(0) ;
        });
        
        Schema::table('doctors',function(Blueprint $table){
            $table->tinyInteger('is_enable')->default(0) ;
        });

        Schema::table('patients',function(Blueprint $table){
            $table->tinyInteger('is_enable')->default(0) ;
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
