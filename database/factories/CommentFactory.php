<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        "user_id" => function(){
            return factory(App\User::class)->create()->id;  
        },
        "song_id" => function(){
            return factory(App\Song::class)->create()->id;  
        },
        "body" => $faker->text,
    ];
});
