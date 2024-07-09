<?php

namespace Database\Seeders;

use App\Models\Market;
use App\Models\Marketplace;
use App\Models\OzonCurrentRegisteredProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OzonOldCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        try {
            $needleOzonCategories = OzonCurrentRegisteredProduct::query()->orderBy('source_category_id')->pluck('source_category_id')->unique()->toArray();
            if (count($needleOzonCategories) > 0) {
                $market = Market::query()
                    ->where('is_active', '=', 1)
                    ->where('marketplace_id', '=', Marketplace::query()->where('slug', 'like', 'ozon')->first()?->id)
                    ->first();
                if ($market) {
                    DB::table('ozon_old_categories')->truncate();
                    foreach ($needleOzonCategories as $categoryID) {
                        $data = $this->getOldOzonCategories($market->credentials, $categoryID);
//                        dd($data->result[0]->category_id, __METHOD__);
                        DB::table('ozon_old_categories')->insert([
                            'old_category_id'   => $data->result[0]->category_id,
                            'name'              => $data->result[0]->title
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . ' ' . $e->getMessage());
        }
    }

    public function getOldOzonCategories(array $credentials, int $categoryID)
    {
        try {
            $response = Http::retry(3, 100)
                ->withHeaders($credentials)
                ->post('https://api-seller.ozon.ru/v2/category/tree', ["language" => "RU", 'category_id' => $categoryID]);
            if ($response->successful()) {
                return json_decode($response);
            }
            if ($response->failed()) {
                Log::error(__METHOD__ . ' Что то пошло не так при синхронизаций атрибутов !');
            }
            return null;
        }
        catch (\Exception $e) {
            Log::error(__METHOD__ . ' ' . $e->getMessage());
            throw new \Exception('Ошибка при синхронизаций категории !');
        }
    }
}
