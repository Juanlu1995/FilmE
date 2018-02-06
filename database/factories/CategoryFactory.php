<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Category::class, function (Faker $faker) {


    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    /*
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
    */
    return [
        'name' => $faker->word,
        'description' => $faker->text(300),
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2
    ];
});
