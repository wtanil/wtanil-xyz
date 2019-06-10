<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function(Faker $faker) {
    return [
        'user_id' => 1,
       	'name' => $faker->sentence,
       	'description' => $faker->paragraph,
       	'hidden' => true,
       	'started_date' => now(),
       	'last_update_date' => now(),
    ];
});

$factory->state(App\Project::class, 'nothidden', function(Faker $faker) {
	return [
		'hidden' => false,
	];
});