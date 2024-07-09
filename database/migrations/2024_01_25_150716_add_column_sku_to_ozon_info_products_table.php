<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ozon_info_products', function (Blueprint $table) {
            $table->bigInteger('sku')->after('ozon_product_id')->default(0);
        });
    }

    public function down(): void
    {
        if(Schema::hasTable('ozon_info_products')){
            Schema::table('ozon_info_products', function (Blueprint $table) {
                $table->dropColumn(['sku']);
            });
        }
    }
};
