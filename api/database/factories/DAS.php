<?php

use Faker\Generator as Faker;

$factory->define(\App\DoctorAppointmentSetting::class, function (Faker $faker) {
    return [
        //
        'doctor_id' => \App\Doctor::orderByRaw('RAND()')->first()->id ,
    ];
});
