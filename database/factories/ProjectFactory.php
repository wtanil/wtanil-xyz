<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'user_id' => 1,
       	'name' => $faker->sentence,
       	'description' => $faker->paragraph,
       	'hidden' => true,
       	'started_date' => $faker->date(),
       	'last_update_date' => $faker->date(),
    ];
});
