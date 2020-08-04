<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorAppointmentSetting extends Model
{
    //
    protected $table = "doctor_appointment_settings";
    protected $fillable = ['doctor_id'];

    protected $attributes = [

        'sitting_time' => '{"default":{"start":"","end":""},"exceptions":[]}',
        'month_dates' => '[]' ,
        'week_days' => '[]' ,

    ];

    public function doctor() {
        return $this->belongsTo('App\Doctor','doctor_id');
    }    
    
}
