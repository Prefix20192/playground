<?php

namespace Database\Seeders;

use App\Models\Marketplace;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MarketplaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Aliexpress',
                'slug' => Str::slug('Aliexpress'),
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now()],
            [
                'name' => 'Ozon',
                'slug' => Str::slug('Ozon'),
                'is_active'  => true,
                'created_at' => now(),
                'updated_at' => now()],
        ];
        $result = $this->checkIfExistsMarketplace($data);
        if (!empty($result)) {
            DB::table('marketplaces')->insert($result);
        }
    }

    protected function checkIfExistsMarketplace(array $data): array
    {
        $result = [];
        foreach($data as $item) {
            if (!Marketplace::query()->where('name', '=', $item['name'])->first()) {
                $result[] = $item;
            }
        }
        return $result;
    }
}
