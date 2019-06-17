<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'priority' => $faker->numberBetween(1, 10),
        'color' => '00FF00',
    ];
});