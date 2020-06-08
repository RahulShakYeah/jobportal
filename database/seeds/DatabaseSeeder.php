<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;
use App\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //It helps to delete the duplicate data
        //Category::truncate();
        // $this->call(UserSeeder::class);
        factory('App\User',20)->create();
        factory('App\Category',5)->create();
        factory('App\Company',20)->create();
        factory('App\Job',20)->create();


        //Role::truncate();
        $adminRole = Role::create(['name' => 'admin']);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => NOW()
        ]);

        $admin->role()->attach($adminRole);

    }
}
