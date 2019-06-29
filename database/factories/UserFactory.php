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
    static $password;
    
    return [
        "name" => $faker->name,
        "email" => $faker->unique()->safeEmail,
        // "password" => "$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm", // secret
        "password" => $password ?: $password = bcrypt("secret"),
        "remember_token" => str_random(10),
        "age" => $faker->randomElement([10, 20, 30, 40, 50, 60, 70]),
        "gender" => $faker->randomElement([1, 2]),
        // "favorite_music_age" => $faker->randomElement([1970, 1980, 1990, 2000, 2010]),
        // "favorite_artist" => $faker->name,
        // "comment" => $faker->text,
        "role" => 10,
    ];
});
