<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Country;
use App\Models\User;
use Carbon\Carbon;
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
// $factory->defineAs(User::class, "admin", function (Faker $faker) {
//     return [
//         'name'              =>  "Admin",
//         'last_name'         =>  "Adminov",
//         'email'             =>  "admin@admin.com",
//         'phone'             =>  $faker->phoneNumber,
//         'name'              =>  $faker->name . "_name",
//         'country'           =>  $faker->country,
//         'email_verified_at' =>  now(),
//         'password'          =>  bcrypt(476674), // password
//         'remember_token'    =>  Str::random(10),
//     ];
// });

$factory->define(User::class, function (Faker $faker) {

    $email              = $faker->unique()->email;
    $login              = Str::before($email, "@");
    $activeCountries    = Country::where("is_active", true)->get()->pluck("id");
    $dateNow            = Carbon::now();

    $contactOptions = [
        $faker->boolean ? "email" : "message",
        $faker->boolean ? "phone" : "sms",
    ];

    // dd($activeCountries);

    return [
        'avatar'            =>  $faker->imageUrl(250, 250, "cats"),
        'login'             =>  $login,
        'first_name'        =>  $faker->name,
        'last_name'         =>  $faker->lastName,
        'email'             =>  $email,
        'phone'             =>  $faker->e164PhoneNumber,
        "dob"               =>  $dateNow->subYears(rand(1, 10))->subMonths(rand(1, 10)),
        "gender"            =>  $faker->boolean ? "male" : "female",
        "contact_options"   =>  $contactOptions,
        'country_id'        =>  $activeCountries[rand(0, $activeCountries->count() - 1)],
        'email_verified_at' =>  $dateNow,
        "role_id"           =>  2,
        "website"           =>  $faker->url,
        'location'          =>  [
            "add_line_1"            =>  $faker->address,
            "add_line_2"            =>  $faker->streetAddress,
            "post_code"             =>  $faker->postcode,
            "city"                  =>  $faker->city,
            "state"                 =>  $faker->citySuffix
        ],
        'social_links'      => [
            "twitter"               => "https://twitter.com/{$login}",
            "facebook"              => "https://www.facebook.com/{$login}",
            "instagram"             => "https://www.instagram.com/{$login}",
            "github"                => "https://github.com/{$login}",
            "codepen"               => "https://codepen.io/{$login}",
            "slack"                 => $login,
        ],
        'fax'               =>  $faker->phoneNumber,
        'password'          =>  bcrypt(User::DEFAULT_PASSWORD),
        'remember_token'    =>  Str::random(10),
    ];
});
