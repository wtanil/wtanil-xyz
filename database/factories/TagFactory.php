<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'priority' => $faker->numberBetween(1, 10),
        'color' => $faker->randomElement([
            'FFFFFF',
            '000000',
            'FF0000',
            '00FF00',
            '0000FF',
            'FFFF00',
            '00FFFF',
            'FF00FF'
        ])
    ];
});