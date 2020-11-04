<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// user name would only change in case of Patient 
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'email',
        'password',
        'name',
        'permissions',
        'type',
        'role_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected function contact(){
        return $this->hasOne('App\Contact');
    }
    public function role(){
        return $this->belongsTo('App\Role','role_id');
    }
    // get doctor associated with the use id 
    public function doctor() {
        return $this->hasOne('App\Doctor','user_id');
    }

    public function hospital() {
        return $this->hasOne('App\Hospital','user_id');
    }

    public function patient() {
        return $this->hasOne('App\Patient','user_id');
    }

    public function appointments(){
        return $this->hasMany('App\Appointment','user_id');
    }

    public function activation() {
        return $this->hasOne('App\Activations','user_id');
    }
    public function roleUser()
    {
        return $this->hasOne('App\RoleUser','user_id');
    }
    public function media(){
        return $this->hasOne('App\Media','user_id') ;
    }
    public static function boot(){
        parent::boot() ;
        
        User::created(function($model){
            $model->activation()->save( \App\Activations::create([
                'user_id'   => $model->id ,
                'code'      => '' ,
                'completed' => 0 ,
            ]));
        });

        User::deleting(function($model){
            $model->hospital()->delete() ;
            $model->doctor()->delete() ;
            $model->patient()->delete() ;
        });
    }
}
