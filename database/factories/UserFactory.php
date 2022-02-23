<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'company_id' => function (){
        if(count(\App\Company::all())>0){
            return \App\Company::all()->random()->id;
        }else{
            return (int) 1;
        }
        },
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => rand(1,9999).$faker->unique(true)->safeEmail,
        'phone_number' => $faker->unique(true)->phoneNumber,
        'created_by_user_id' => function(){
            return \App\User::inRandomOrder()->first();
        },
        'email_verified_at' => \Carbon\Carbon::now(),
        'password' => bcrypt($faker->password),
        'remember_token' => Str::random(10),
    ];
});
