<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

// Admin
$factory->defineAs(User::class, "admin", function (Faker $faker) {
    return [
        'name'              =>  "Admin",
        'last_name'         =>  "Adminov",
        'email'             =>  "admin@admin.com",
        'phone'             =>  $faker->phoneNumber,
        'name'              =>  $faker->name . "_name",
        'country'           =>  $faker->country,
        'email_verified_at' =>  now(),
        'password'          =>  bcrypt(476674), // password
        'remember_token'    =>  Str::random(10),
    ];
});

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              =>  $faker->name,
        'last_name'         =>  $faker->lastName,
        'email'             =>  $faker->unique()->safeEmail,
        'phone'             =>  $faker->phoneNumber,
        'name'              =>  $faker->name . "_name",
        'country'           =>  $faker->country,
        'email_verified_at' =>  now(),
        'password'          =>  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token'    =>  Str::random(10),
    ];
});
