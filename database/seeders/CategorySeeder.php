<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Electronics',
                'subcategories' => [
                    ['name' => 'Smartphones'],
                    ['name' => 'Laptops'],
                    ['name' => 'Cameras'],
                ],
            ],
            [
                'name' => 'Clothing',
                'subcategories' => [
                    ['name' => 'Men'],
                    ['name' => 'Women'],
                ],
            ],
            [
                'name' => 'Furniture',
                'subcategories' => [
                    ['name' => 'Living Room'],
                    ['name' => 'Bedroom'],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create(['name' => $categoryData['name']]);

            foreach ($categoryData['subcategories'] as $subcategory) {
                Category::create([
                    'name' => $subcategory['name'],
                    'parent_id' => $category->id,
                ]);
            }
        }
    }
}
