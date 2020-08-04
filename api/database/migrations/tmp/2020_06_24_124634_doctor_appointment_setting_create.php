<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DoctorAppointmentSettingCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('doctor_appointment_settings',function(Blueprint $table){
            $table->increments('id'); 
            $table->integer('doctor_id'); 
            $table->string('start_date')->default(''); 
            $table->string('end_date')->default(''); 
            $table->boolean('monthly')->default(0); 
            $table->boolean('weekly')->default(0); 
            $table->json('month_dates'); 
            $table->json('week_days');  
            $table->json('sitting_time');// json 
            $table->integer('num_of_allowed_patients')->default(1); // default 0 
            $table->integer('advance_booking_days')->default(10); // default 10 

        });

        Schema::table('doctor_appointment_settings',function(Blueprint $table){
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
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
