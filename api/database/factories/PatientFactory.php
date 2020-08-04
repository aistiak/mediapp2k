<?php

use Faker\Generator as Faker;

$factory->define(App\Patient::class, function (Faker $faker) {
    $user = factory(\App\User::class,1)->create();
    return [
        //
        'user_id' => $user->first()->id,
    ];
});
