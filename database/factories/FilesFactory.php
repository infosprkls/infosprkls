<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Files::class, function (Faker $faker) {
    return [
        'file_location' => $faker->word,
        'uploadable_id' => $faker->randomNumber(),
        'uploadable_type' => $faker->word,
    ];
});
