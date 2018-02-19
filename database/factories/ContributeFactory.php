<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Contribute::class, function (Faker $faker) {


    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    $image = 'https://picsum.photos/250/250?image=' . mt_rand(0, 100);

    $name = $faker->name;
    $lastName = $faker->lastName;
    $slug = str_slug($name . "-" . $lastName, "-");
    return [
        'name' => $name,
        'last_name' => $lastName,
        'slug' => $slug,
        'photo' => $image,
        'birth_date' => Carbon::createFromTimestamp($faker->dateTimeBetween("-90 years", Carbon::now()->getTimestamp())->getTimestamp())->toDateString(),
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2,
    ];
});
