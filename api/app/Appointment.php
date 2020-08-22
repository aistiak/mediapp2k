<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = "appointments" ;
    public $guarded = [] ;
    public function patient(){
        return $this->belongsTo('App\User','user_id');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor','doctor_id');
    }
}
