<?php

use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add some categories to the existing projects
         */
        \App\Project::all()->each(function ($project) {
            $project->categories()->saveMany(factory(\App\Category::class, 3)->make());
        });
    }
}
