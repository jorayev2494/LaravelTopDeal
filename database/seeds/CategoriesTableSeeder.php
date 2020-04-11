<?php

use App\Models\Category;
use App\Models\TranslateCategory;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add categories
        factory(Category::class, 2)->create()->each(function($category) {
            // Trans for $category
            factory(TranslateCategory::class)->create(['category_id' => $category->id]);

            if ($category->id > $category->id + 2) return;
            
            // Add Child Categories
            $childCats = factory(Category::class, 3)->create(['parent_id' => $category->id])->each(function($childCategory) {
                // Trans for $childCategory
                $transCategory = factory(TranslateCategory::class)->create(['category_id' => $childCategory->id]);
            });
            $category->categories()->saveMany(factory($childCats));
        });
    }
}
