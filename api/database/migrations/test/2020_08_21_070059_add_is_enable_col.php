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
        // if(Schema::hasColumn('hospitals','is_enable'))
        // Schema::table('hospitals',function(Blueprint $table){
        //     $table->dropColumn('is_enable') ;
        // });
        
        // if(Schema::hasColumn('doctors','is_enable'))
        // Schema::table('doctors',function(Blueprint $table){
        //     $table->dropColumn('is_enable') ;
        // });

        // if(Schema::hasColumn('patients','is_enable'))
        // Schema::table('patients',function(Blueprint $table){
        //     $table->dropColumn('is_enable') ;
        // });
    }
}
