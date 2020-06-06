<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $fillable = [
        'district_id',
        'dmp',
        'name',
        'bn_name'
    ];

    protected $table = 'geo_upazilas';

    public function division()
    {
        return $this->belongsTo('App\District','geo_division_id');
    }
    public function district()
    {
        return $this->belongsTo('App\District','geo_district_id');
    }

    public function hospitals(){
        return $this->hasMany('App\Hospital','upazila_id');
    }
}
