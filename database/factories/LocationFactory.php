<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'company_id' => $faker->randomNumber(),
        'street_name' => $faker->streetName,
        'house_number' => $faker->randomNumber(2),
        'appartment_suite' => $faker->randomLetter,
        'city' => $faker->city,
        'region' => $faker->word,
        'country' => $faker->country,
        'zip_code' => $faker->postcode,
    ];
});
