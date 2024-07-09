<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ozon_current_registered_products', function (Blueprint $table) {
            $table->string('barcode', 100)->nullable()->after('is_visible');
            $table->float('vat')->nullable()->after('is_visible');
            $table->float('volume_weight')->nullable()->after('is_visible');
            $table->boolean('is_kgt')->nullable()->after('is_visible');
            $table->json('data_attributes')->nullable()->after('old_price');
            $table->integer('weight')->nullable()->after('is_kgt');
            $table->integer('height')->nullable()->after('is_kgt');
            $table->integer('depth')->nullable()->after('is_kgt');
            $table->integer('width')->nullable()->after('is_kgt');
            $table->json('images')->nullable()->after('errors');
        });
        if (Schema::hasColumn('ozon_current_registered_products', 'status')) {
            Schema::table('ozon_current_registered_products', function (Blueprint $table) {
                $table->dropColumn(['status']);
            });
        }
        if (Schema::hasColumn('ozon_current_registered_products', 'data_info')) {
            Schema::table('ozon_current_registered_products', function (Blueprint $table) {
                $table->dropColumn(['data_info']);
            });
        }
        if (Schema::hasColumn('ozon_current_registered_products', 'data_product')) {
            Schema::table('ozon_current_registered_products', function (Blueprint $table) {
                $table->dropColumn(['data_product']);
            });
        }
    }

    public function down(): void
    {
        Schema::table('ozon_current_registered_products', function (Blueprint $table) {
            $table->dropColumn(['barcode', 'vat', 'volume_weight', 'is_kgt', 'data_attributes', 'weight', 'height', 'depth', 'width', 'images']);
        });
    }
};
