<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use App\Models\Country;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Admin::class, function (Faker $faker) {

    $email      = "admin@mail.com";
    $countries  = Country::where("is_active", true)->get();

    return [
        "avatar"            => $faker->imageUrl(500, 500, "cats"),
        "login"             => Str::before($email, "@"),
        "first_name"        => "Admin",
        "last_name"         => "Adminov",
        "email"             => $email,
        "dob"               => Carbon::now()->addYears(rand(1, 5)),
        "gender"            => "other",
        "country_id"        => $countries[rand(0, $countries->count())]->id,
        "password"          => Hash::make("476674"),
    ];
});
