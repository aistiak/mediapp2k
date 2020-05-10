<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //
    function user(){
        return $this->belongsTo('App\User','user_id');
    }

    function doctors(){
        return $this->hasMany('App\Doctor','hospital_id');
    }
}
