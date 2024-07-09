<?php

namespace Database\Seeders;

use App\Models\Market;
use App\Models\Marketplace;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MarketSeeder extends Seeder
{
    public function run(): void
    {
        $marketplaces = Marketplace::query()->select('id', 'name', 'slug')->get();

        if ($marketplaces->count() > 0) {
            $ozon = $marketplaces->where('slug', '=', "ozon")->first();

            if (!is_null($ozon)) {
                $name = 'Автоэльдорадо ТЕСТ';
                Market::query()->create([
                    'marketplace_id'        => $ozon->id,
                    'name'                  => $name,
                    'slug'                  => Str::slug($name, '_'),
                    'credentials'           => config('ozon.credentials'),
                    'min_stock_quantity'    => 1,
                    'is_active'             => false,
                    'user_id'               => User::query()
                        ->where('email', '=', 'example@example.com')
                        ->first()?->id,
                ]);
            }

            $ali = $marketplaces->where('slug', 'like', 'aliexpress')->first();

            if (!is_null($ali)) {
                $name = 'Valeo Aliexpress';
                Market::query()->create([
                    'marketplace_id'        => $ali->id,
                    'name'                  => $name,
                    'slug'                  => Str::slug($name, '_'),
                    'credentials'           => config('aliexpress.credentials'),
                    'min_stock_quantity'    => 1,
                    'is_active'             => false,
                    'user_id'               => User::query()
                        ->where('email', '=', 'example@example.com')
                        ->first()?->id,
                ]);
            }
        }
    }
}
