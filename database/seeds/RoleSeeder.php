<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(count(Role::all()) == 0) {
        Role::create(["name"=>"super admin", "guard_name"=>"web"]);
        DB::table('model_has_roles')->insert([
            "role_id"=> \Spatie\Permission\Models\Role::first()->id,
            "model_type"=>"App\User",
            "model_id"=> \App\User::first()->id
        ]);
        }
    }
}
