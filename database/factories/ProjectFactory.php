<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => $faker->randomElement(["Not started","In progress","On hold","Completed"]),
        'responsible_user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'amount_of_hours'=>rand(1,2500),
        'description' => $faker->text,
        'created_by_user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'started_at'=>$faker->dateTime,
        'deadline'=>$faker->dateTime,

    ];
});
