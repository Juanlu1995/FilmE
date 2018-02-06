<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\View::class, function (Faker $faker) {

    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'ip' => DB::raw('INET_ATON('.'"'.$faker->ipv4.'"'.')'),
        'created_at'=> ($time1 < $time2) ? $time1 : $time2,
        'updated_at'=> ($time1 > $time2) ? $time1 : $time2
    ];
});
