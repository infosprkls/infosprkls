<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Hour::class, function (Faker $faker) {

    $project = \App\Project::all()->random();
    $user_id = $project->companies->first()->users->random()->id;
    return [
        'activity'=>$faker->text(20),
        'start' => $faker->unixTime,
        'end' => $faker->unixTime,
        "project_id"=> $project,
        "user_id"=>$user_id
    ];
});
