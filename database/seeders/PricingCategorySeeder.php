<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\PricingCategory;
use Illuminate\Database\Seeder;

class PricingCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categoryList = Category::query()
            ->whereDoesntHave('children')
            ->whereHas('ozonCategories')
            ->select('id')
            ->get();

        foreach ($categoryList as $category) {
            PricingCategory::query()->updateOrCreate([
                'category_id' => $category->id,
            ], [
                'interest'  => 17.5
            ]);
        }
    }
}
