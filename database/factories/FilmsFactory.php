<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Film::class, function (Faker $faker) {
    $categorías = [
        "acción‎",
        "animación‎",
        "artes marciales‎",
        "aventuras",
        "basadas en hechos reales‎",
        "ciencia ficción‎",
        "cine negro‎",
        "cómica",
        "documental‎",
        "drama",
        "eróticas‎",
        "fantásticas‎",
        "gore",
        "guerra‎",
        "infantiles‎",
        "intriga‎",
        "LGBT‎",
        "misterio‎",
        "musicales‎",
        "propaganda‎",
        "adolescentes‎",
        "policíacas‎",
        "movies‎",
        "románticas‎",
        "satíricas‎",
        "terror‎",
        "Wéstern‎",
    ];

    return [
        'name' => $faker->unique()->name,
        'synopsis' => $faker->text(400),
        'cover' => 'http://lorempixel.com/800/600/',
        'date' => Carbon::createFromTimestamp($faker->dateTimeBetween("-193 years", Carbon::now()->getTimestamp())->getTimestamp())->toDateString(),
        'duration' => $faker->numberBetween(20,390),
        'category' => $faker->randomElement($categorías),
        'rating' => $faker->numberBetween(0,100),
        'actors' => $faker->name,
        'directors' => $faker->name,
        'producer' => $faker->company,
        'reviews_counted' => 0,
        'views_counted' => 0,
        'country' => $faker->country
    ];
});
