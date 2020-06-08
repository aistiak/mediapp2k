<?php

use Faker\Generator as Faker;

$factory->define(App\Hospital::class, function (Faker $faker) {
    return [
        'user_id' => App\User::orderByRaw('RAND()')->first()->id,
        'is_active' => 1 ,
        'name' => $faker->name . " yHospital " ,
        'phone_no' => $faker->unique()->tollFreePhoneNumber,
        'address' => $faker->unique()->streetAddress,
        'email' => $faker->unique()->safeEmail,
        'division_id' => App\Division::orderByRaw('RAND()')->first()->id,
        'district_id' => App\District::orderByRaw('RAND()')->first()->id,
        'upazila_id' => App\Upazila::orderByRaw('RAND()')->first()->id,
    ];
});