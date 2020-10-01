<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $guarded = [] ;
    // protected $fillable = ['is_enable','is_active'] ;
    protected $table = "patients" ;

    function user(){
        return $this->belongsTo('App\User','user_id');
    }

    // function appointments() {
    //     return $this->hasMany('App\Appointment','user_id'); // patient_id
    // }
    
    
}
