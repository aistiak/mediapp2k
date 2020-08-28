<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [] ;
    //
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function hospital(){
        return $this->belongsTo('App\Hospital','hospital_id');
    }

    public function appointment_setting(){
        // return $this->hasOne('App\DoctorAppointmentSetting','doctor_id');
        return $this->hasOne('App\AppointmentSetting','doctor_id');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment','doctor_id')->with('patient');
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
