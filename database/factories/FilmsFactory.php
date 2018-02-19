<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Film::class, function (Faker $faker) {

    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    $image = 'https://picsum.photos/800/600?image=' . mt_rand(0, 1000);


    return [
        'name' => $faker->unique()->name,
        'synopsis' => $faker->text(400),
        'cover' => $image,
        'date' => Carbon::createFromTimestamp($faker->dateTimeBetween("-193 years", Carbon::now()->getTimestamp())->getTimestamp())->toDateString(),
        'duration' => $faker->numberBetween(20, 390),
        'rating' => $faker->numberBetween(0, 100),
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2
    ];
});
