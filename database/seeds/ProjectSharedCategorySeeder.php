<?php

use Illuminate\Database\Seeder;

class ProjectSharedCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Make some projects share categories
         */
        \App\Project::all()->each(function ($project) {
            $project->categories()->saveMany(\App\Category::inRandomOrder()->take(rand(1,5))->get());
            $project->hoursBooked()->saveMany(factory(\App\Hour::class,10)->make());
        });
    }
}
