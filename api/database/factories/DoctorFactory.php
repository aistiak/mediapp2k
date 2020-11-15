<?php

use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
    
    $user = factory(\App\User::class,1)->create();
    // $division = App\Division::orderByRaw('RAND()')->first();
    // $district = $division->orderByRaw('RAND()')->first() ;
    // $upazila  = $district->orderByRaw('RAND()')->first() ;
    $hospital = App\Hospital::orderByRaw('RAND()')->first() ;
    return [
        //
        'name'  => $faker->name ,
        'title' => 'MBBS  ' . $faker->country($faker->countryCode),
        'user_id' => $user->first()->id ,
        'hospital_id' => $hospital->id,
        'is_active' => 1 ,
        'division_id'   => $hospital->division_id ,
        'district_id'   => $hospital->district_id,
        'upazila_id'    => $hospital->upazila_id,
    ];
});
