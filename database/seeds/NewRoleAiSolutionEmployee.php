<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class NewRoleAiSolutionEmployee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Role::where('name' , 'employee')->count() == 0) {
	        Role::create(["name"=>"employee", "guard_name"=>"web"]);
        }
    }
}
