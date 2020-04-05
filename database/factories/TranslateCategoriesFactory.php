<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TranslateCategory;
use Faker\Generator as Faker;

$factory->define(TranslateCategory::class, function (Faker $faker) {
    $en = \Faker\Factory::create('en_US');      // English
    $ru = \Faker\Factory::create('ru_RU');      // Russian
    // $ua = \Faker\Factory::create('uk_UA');      // Ukraine

    return [
        'category_id'   => 1,
        'en'            => $en->name,
        'ru'            => $ru->name,
        // 'ua'            => $ua->name,
    ];

});
