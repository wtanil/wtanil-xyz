<?php

use Faker\Generator as Faker;

$factory->define(App\image::class, function (Faker $faker) {
    return [
        'project_id' => 1,
        'priority' => 1,
        'subtitle' => $faker->sentence,
        'low_res_url' => '',
        'high_res_url' => ''
    ];
});
