<?php

use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
    
    $user = factory(\App\User::class,1)->create();
    return [
        //
        'user_id' => $user->first()->id ,
        'hospital_id' => App\Hospital::orderByRaw('RAND()')->first()->id ,
        'is_active' => 1 ,
    ];
});
