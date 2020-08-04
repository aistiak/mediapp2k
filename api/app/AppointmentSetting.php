<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentSetting extends Model
{
    //
    protected $table = "appointment_settings" ;

    protected $attributes = [
        'morning' => '{}' ,
        'evening' => '{}' ,
        'monthly' => '[]' ,
        'weekly'  => '[]' ,

    ];

}
