<?php

use Faker\Generator as Faker;

$factory->define(App\Hospital::class, function (Faker $faker) {

    $user = factory(\App\User::class,1)->create()->first();
    $division = App\Division::orderByRaw('RAND()')->first();
    $district = $division->districts()->orderByRaw('RAND()')->first() ;
    $upazila  = $district->upazilas()->orderByRaw('RAND()')->first() ;
    
    return [
        // 'user_id' => App\User::orderByRaw('RAND()')->first()->id,
        'user_id' => $user->id ,
        'is_active' => 1 ,
        'name' => $faker->name . " Hospital " ,
        'phone_no' => $faker->unique()->tollFreePhoneNumber,
        'address' => $faker->unique()->streetAddress,
        'email' => $faker->unique()->safeEmail,
        'division_id'   => $division->id ,
        'district_id'   => $district->id,
        'upazila_id'    => $upazila->id,
    ];
});