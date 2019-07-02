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

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word,

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
        ]),
        'hidden' => true
    ];
});

