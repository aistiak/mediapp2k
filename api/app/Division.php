<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
    protected $table = "geo_divisions";

    public function districts(){
        return $this->hasMany('App\District','geo_division_id');
    }
    public function upazilas(){
        return $this->hasMany('App\Upazila','geo_division_id');
    }

    public function hospitals(){
        return $this->hasMany('App\Hospital','division_id');
    }

}
