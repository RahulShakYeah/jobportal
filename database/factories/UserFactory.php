<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Company;
use App\Job;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'user_type' => 'seeker',
        'status' => 'active',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => 'active'
    ];
});


$factory->define(Company::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'company_name' => $name = $faker->company,
        'slug' => Str::slug($name),
        'address' => $faker->address,
        'website' => $faker->domainName,
        'phone' => $faker->phoneNumber,
        'logo' => 'images/logo/logo.png',
        'cover_photo' => 'images/coverphoto/cover-photo.jpg',
        'slogan' => 'learn,sleep and repeat',
        'description' => $faker->paragraph(rand(2,9)),
        'status' => 'active'
    ];
});

$factory->define(Job::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'company_id' => Company::all()->random()->id,
        'title' => $name = $faker->text,
        'slug' => Str::slug($name),
        'position' => $faker->jobTitle,
        'address' => $faker->address,
        'category_id' => rand(1,5),
        'status' => rand(0,1),
        'type' => 'fulltime',
        'description' => $faker->paragraph(rand(2,9)),
        'roles' => $faker->text,
        'last_date' => $faker->dateTime,
        'number_of_vacancy' => rand(1,10),
        'year_of_experience' => rand(1,10),
        'salary' => rand(10000,200000)
    ];
});

