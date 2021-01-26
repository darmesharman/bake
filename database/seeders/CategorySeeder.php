<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Детские сады' => [
                'Частные',
                'Государственные',
            ],
            'Детские лагеря' => [
                'Спортивные лагеря',
                'Творческие лагеря',
                'Туристический лагерь',
            ],
        ];

        foreach ($categories as $category => $subCategories) {
            if (Category::where('name', $category)->first()) {
                // if category exists take it
                $category = Category::where('name', $category)->first();
            } else {
                // otherwise create new one
                $category = Category::factory(['name' => $category])->create();
            }

            foreach ($subCategories as $subCategory) {
                if (SubCategory::where('name', $subCategory)
                        ->where('category_id', $category->id)
                        ->first()
                    ) {
                    continue;
                }

                SubCategory::factory(['name' => $subCategory])
                    ->for($category)
                    ->create();
            }
        }
    }
}
