<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activations extends Model
{
    //
    protected $table = "activations" ; 
    protected $fillable = ['user_id' , 'completed' ,'code'] ;
}
