<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $name = $faker->firstName;
    $lastNane = $faker->lastName;
    $username = strtolower($name).".".strtolower($lastNane);
    return [
        'name' => $name,
        'lastName' => $lastNane,
        'username' => $username,
        'email' => $username."@".$faker->safeEmailDomain,
        'phone' => $faker->e164PhoneNumber(),
        'website' => $faker->boolean ? $faker->domainName : "Undefined",
        'about' => $faker->text(255),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
