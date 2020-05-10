<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    function user(){
        return $this->belongsTo('App\User','user_id');
    }

    function hospital(){
        return $this->belongsTo('App\Hospital','hospital_id');
    }

    
}
