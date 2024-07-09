<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\CardProduct;
use App\Models\Nomenclature;
use Illuminate\Database\Seeder;

class BrandListSeeder extends Seeder
{
    public function run(): void
    {
        $brands = Nomenclature::query()->select('brand_name')->pluck('brand_name')->unique()->toArray();
        foreach ($brands as $brand) {
            Brand::query()->updateOrCreate([
                'name'  => $brand,
            ], [
                'is_active' => false
            ]);
        }
        $activeBrands = CardProduct::query()->distinct('brand_name')->select('brand_name')->pluck('brand_name')->unique()->toArray();
        Brand::query()->whereIn('name', $activeBrands)->update(['is_active' => true]);
    }
}
