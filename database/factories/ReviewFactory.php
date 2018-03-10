<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'title' => implode($faker->words(5), " "),
        'content' => $faker->text(1000),
        'rating' => $faker->numberBetween(0,100),
    ];
});
