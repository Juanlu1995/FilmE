<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->text(300),
        'rating' => $faker->numberBetween(0,100),
    ];
});
