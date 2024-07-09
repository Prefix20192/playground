<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('ozon_current_registered_products', 'old_price')) {
            Schema::table('ozon_current_registered_products', function (Blueprint $table) {
                $table->float('old_price')->nullable()->after('is_visible');
            });
        }
        if (! Schema::hasColumn('ozon_current_registered_products', 'price')) {
            Schema::table('ozon_current_registered_products', function (Blueprint $table) {
                $table->float('price')->nullable()->after('is_visible');
            });
        }
        if (! Schema::hasColumn('ozon_current_registered_products', 'min_price')) {
            Schema::table('ozon_current_registered_products', function (Blueprint $table) {
                $table->float('min_price')->nullable()->after('is_visible');
            });
        }
        if (! Schema::hasColumn('ozon_current_registered_products', 'data_info')) {
            Schema::table('ozon_current_registered_products', function (Blueprint $table) {
                $table->json('data_info')->nullable()->after('old_price');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('ozon_current_registered_products', 'old_price')) {
            Schema::table('ozon_current_registered_products', function (Blueprint $table) {
                $table->dropColumn('old_price');
            });
        }
        if (Schema::hasColumn('ozon_current_registered_products', 'price')) {
            Schema::table('ozon_current_registered_products', function (Blueprint $table) {
                $table->dropColumn('price');
            });
        }
        if (Schema::hasColumn('ozon_current_registered_products', 'min_price')) {
            Schema::table('ozon_current_registered_products', function (Blueprint $table) {
                $table->dropColumn('min_price');
            });
        }
        if (Schema::hasColumn('ozon_current_registered_products', 'data_info')) {
            Schema::table('ozon_current_registered_products', function (Blueprint $table) {
                $table->dropColumn('data_info');
            });
        }
    }
};
