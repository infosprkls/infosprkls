<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\AdministrativeDecision::class, function (Faker $faker) {
    return [
        'company_id' => $faker->randomNumber(2),
        'project_name' => $faker->word,
        'project_hours' => $faker->randomNumber(),
        'project_start_date' => $faker->dateTime(),
        'project_end_date' => $faker->dateTime(),
        'amount' => $faker->randomNumber(3),
        'accountable_money' => $faker->randomFloat(2,3,10000),
        'status' => $faker->randomElement(["In progress","Granted","Rejected","Partially Granted"]),
    ];
});
