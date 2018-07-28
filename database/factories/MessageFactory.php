<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'title' => 'Alicia '.mt_rand(0,50),
        'content' => $faker->realText(500),
        'image' => 'http://placeimg.com/600/400?'.mt_rand(0,1000)
    ];
});
