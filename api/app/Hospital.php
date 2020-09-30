<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $guarded = [] ; 
    // protected $fillable = ['*'] ;
    //

    function user(){
        return $this->belongsTo('App\User','user_id');
    }

    function doctors(){
        return $this->hasMany('App\Doctor','hospital_id');
    }

    function appointments(){
        return $this->hasMany('App\Appointment','hospital_id') ;
    }

    // after creation set role id to 2 
    public static function boot(){
        parent::boot();
        Hospital::created(function($model){
            $model->user->update(['role_id' => 2]);
        });

        Hospital::deleting(function($model){
            $model->user()->delete() ;
        });
    }
}
