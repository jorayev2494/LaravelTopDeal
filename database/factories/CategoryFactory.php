<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    $activeCategories = Category::where([
        "is_active" => true,
        "parent_id" => null
    ])->get();

    // dd($activeCategories[0]->id);

    return [
        "slug"          => $faker->unique()->slug(),
        "parent_id"     => $activeCategories->count() > 1 ? $activeCategories[rand(1, $activeCategories->count() - 1)]->id : null,
        "is_active"     => $faker->boolean,
    ];
});
