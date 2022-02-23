<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * make some companies with projects
         */
        factory(\App\Company::class, 5)->create()->each(function ($company) {
            $company->projects()->saveMany(factory(\App\Project::class, 5)->make());
            $company->users()->saveMany(factory(\App\User::class,4)->make());
            $company->locations()->save(factory(\App\Location::class)->make());
        });
    }
}
