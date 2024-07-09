<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ozon_info_products', function (Blueprint $table) {
            $table->string('brand')->nullable()->after('source_product_id')->index()
                ->comment('Бренд полученный из характеристик');
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('ozon_info_products')) {
            Schema::table('ozon_info_products', function (Blueprint $table) {
                $table->dropIndex(['brand']);
                $table->dropColumn('brand');
            });
        }
    }
};
