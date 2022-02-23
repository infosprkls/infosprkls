<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(count(\App\User::all()) == 0) {
            DB::table('users')->insert([
                'email' => "admin@gmail.com",
                "company_id" => 1,
                'password' => bcrypt('secret'),
                "created_at"=>now()
            ]);
        }

        $this->call([
            CompanySeeder::class,
            SharedProjectCompanySeeder::class,
            ProjectCategorySeeder::class,
            UserSeeder::class,
            ProjectSharedCategorySeeder::class,
            RoleSeeder::class,
            NewRoleAiSolutionEmployee::class,

            
            ]);
            factory(\App\Rule::class, 5)->create();

//        factory(\App\AdministrativeDecision::class, 5)->create();
//        factory(\App\Category::class, 5)->create();
//        factory(\App\Files::class, 5)->create();


        $role = new \Spatie\Permission\Models\Role();
        $role->name = "default user";
        $role->guard_name = "web";
        $role->timestamps;
        $role->save();


        foreach (User::all() as $user){
            $user->roles()->save($role);
        }

    }
}
