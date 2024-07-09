<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\PricingCategory;
use Illuminate\Database\Seeder;

class SetPricingCategoryPercent extends Seeder
{
    public function run(): void
    {
        $categories = Category::whereHas('cardProducts')->get();
        if (count($categories) > 0) {
            foreach ($categories as $category) {
                PricingCategory::query()->updateOrCreate([
                    'category_id' => $category->id,
                ], [
                    'interest' => rand(15, 25),
                    'modified_by' => User::where('email', 'like', 'echo.%')->first()->id ?? null
                ]);
            }
        }
    }
}
