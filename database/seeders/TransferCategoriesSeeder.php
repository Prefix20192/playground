<?php

namespace Database\Seeders;

use App\Models\CardProduct;
use App\Models\Category;
use Illuminate\Database\Seeder;

class TransferCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $cardProducts = CardProduct::query()->whereHas('categories')->get();
        foreach ($cardProducts as $cardProduct) {
            $category = Category::find($cardProduct->categories->first()->id);
            if ($category) {
                $cardProduct->category_id = $category->id;
                $cardProduct->save();
            }
            $cardProduct->categories()->detach();
        }
    }
}
