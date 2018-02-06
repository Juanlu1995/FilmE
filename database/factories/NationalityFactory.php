<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Nationality::class, function (Faker $faker) {
    return [
        'name' => $faker->country
    ];
});
