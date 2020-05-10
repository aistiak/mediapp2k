<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DoctorHospitalRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('doctors',function(Blueprint $table){
            $table->integer('hospital_id')->nullable();
        });
        Schema::table('doctors',function(Blueprint $table){
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade')->onUpdate('cascade');
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
