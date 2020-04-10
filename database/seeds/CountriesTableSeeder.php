<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Countries
        $countries = [
            "Turkmenistan",
            "Ukraine",
            "Turkey",
        ];

        // Add in table countries
        foreach ($countries as $key => $country) {
            DB::table("countries")->insert(['slug' => $country, 'is_active' => true]);
        }
    }
}
