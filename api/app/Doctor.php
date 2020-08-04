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

    function appointment_setting(){
        // return $this->hasOne('App\DoctorAppointmentSetting','doctor_id');
        return $this->hasOne('App\AppointmentSetting','doctor_id');
    }

    function appointments() {
        return $this->hasMany('App\Appointment','doctor_id');
    }     

    protected static function boot(){
        parent::boot();
        Doctor::created(function($model){

            // both are valid 
            
            // \App\DoctorAppointmentSetting::create([
            //     'doctor_id' => $model->id ,
            // ]);

            // $model->appointment_setting()->save(new \App\DoctorAppointmentSetting) ;
            $model->appointment_setting()->save(new \App\AppointmentSetting) ;
        
        
        });
        // delete appointment setting when deleting doctor 
        Doctor::deleting(function($model){
            $model->appointment_setting()->delete() ;
        });
    }
    
}
