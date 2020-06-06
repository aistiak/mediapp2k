<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table = "geo_districts";

    public function division()
    {
        return $this->belongsTo('App\Division','geo_division_id');
    }

    public function upazilas()
    {
        return $this->hasMany('App\Upazila', 'geo_district_id');
    }

    public function hospitals(){
        return $this->hasMany('App\Hospital','district_id');
    }
}
