<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'contact_user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'created_by_user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'status' => $faker->boolean,
    ];
});
