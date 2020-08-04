<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->tinyInteger('is_monthly')->default(0);
            $table->json('monthly'); // ex : [ 1 , 2 , 14 ]
            $table->tinyInteger('is_weekly')->default(0);
            $table->json('weekly'); //  ex : [sat , sun , wed ]
            $table->tinyInteger('is_morning')->default(0);
            $table->json('morning'); // ex : { start: 10 pm , end: 12 pm , slot : 20  }
            $table->tinyInteger('is_evening')->default(0);
            $table->json('evening'); // ex : { start: 10 pm , end: 12 pm , slot : 20  }
            $table->timestamps();
        });

        Schema::table('appointment_settings',function(Blueprint $table){
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
        Schema::dropIfExists('appointment_settings');
    }
}
