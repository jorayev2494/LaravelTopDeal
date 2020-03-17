<?php

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
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
        factory(Category::class, 10)->create();

        // Generate Parents
        for ($i = 0; $i < 2; $i++) { 
            foreach ($this->getActiveCategories() as $category) {
                factory(Category::class)->create(["parent_id" => $category->id]);
            }
        }
    }

    /**
     * Get Active Categories
     *
     * @return Collection
     */
    public function getActiveCategories() : Collection
    {
        return Category::where([
            "is_active" => true,
            "parent_id" => null
        ])->get();
    }

    /**
     * Get All Categories
     *
     * @return Collection
     */
    public function getCategories() : Collection
    {
        return Category::where([
            // "is_active" => true,
            "parent_id" => null
        ])->get();
    }
}
