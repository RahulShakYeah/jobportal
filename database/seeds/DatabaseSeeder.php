<?php

use Illuminate\Database\Seeder;
use App\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory('App\User',20)->create();
        factory('App\Company',20)->create();
        factory('App\Job',20)->create();

        $categories = [
            'Technology',
            'Software',
            'Construction',
            'Electrical Engeneering',
            'Teaching',
            'Web Development'
        ];

        foreach ($categories as $category){
            Category::create(['name'=>$category]);
        }
    }
}
