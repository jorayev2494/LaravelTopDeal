<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        "slug"          => $faker->slug(2),
        "parent_id"     => null,
        "is_active"     => true,
    ];
});
