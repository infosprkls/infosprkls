<?php

use Illuminate\Database\Seeder;

class SharedProjectCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Make some companies share projects
         */
        \App\Company::all()->take(5)->each(function ($company){
            $company->projects()->saveMany(\App\Project::inRandomOrder()->take(rand(1,5))->get());
        });
    }
}
