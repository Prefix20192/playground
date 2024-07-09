<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ozon_info_products', function (Blueprint $table) {
            if (!Schema::hasColumn('ozon_info_products', 'volume_weight')) {
                $table->double('volume_weight', 10, 6)->nullable()->comment("Объёмный вес товара");
            }
        });
    }

    public function down(): void
    {
        Schema::table('ozon_info_products', function (Blueprint $table) {
            if (Schema::hasColumn('ozon_info_products', 'volume_weight')) {
                $table->dropColumn('volume_weight');
            }
        });
    }
};
