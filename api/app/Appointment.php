<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = "appointments" ;

    function patient(){
        return $this->belongsTo('App\Patient','user_id');
    }
}
