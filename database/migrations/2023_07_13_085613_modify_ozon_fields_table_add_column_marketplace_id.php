<?php

use App\Models\Marketplace;
use Database\Seeders\AliFieldsSeeder;
use Database\Seeders\LocalAttributeSeeder;
use Database\Seeders\MarketplaceSeeder;
use Database\Seeders\MarketSeeder;
use Database\Seeders\OzonFieldsSeeder;
use Database\Seeders\PortalCategoriesSeeder;
use Database\Seeders\UsersSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
//         Artisan::call('db:seed', [
//             '--class' => 'UsersSeeder',
//         ]);
//         Artisan::call('db:seed', [
//             '--class' => 'PortalCategoriesSeeder',
//        ]);
//         Artisan::call('db:seed', [
//             '--class' => 'MarketplaceSeeder',
//         ]);
//         Artisan::call('db:seed', [
//             '--class' => 'MarketSeeder',
//         ]);
//         Artisan::call('db:seed', [
//             '--class' => 'AliFieldsSeeder',
//         ]);
//         Artisan::call('db:seed', [
//             '--class' => 'OzonFieldsSeeder',
//         ]);
//         Artisan::call('db:seed', [
//             '--class' => 'UpdateAttributeSeeder',
//         ]);


        Schema::table('ozon_fields', function (Blueprint $table) {
            $table->unsignedBigInteger('marketplace_id')
                ->after('id')
                ->default(Marketplace::query()->where('slug', '=', 'ozon')->first()->id??0);
        });
        Schema::table('ali_fields', function (Blueprint $table) {
            $table->unsignedBigInteger('marketplace_id')
                ->after('id')
                ->default(Marketplace::query()->where('slug', '=', 'aliexpress')->first()->id??0);
        });
    }

    public function down(): void
    {
        Schema::table('ozon_fields', function (Blueprint $table) {
            $table->dropColumn(['marketplace_id']);
        });
        Schema::table('ali_fields', function (Blueprint $table) {
            $table->dropColumn(['marketplace_id']);
        });
    }
};
