<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('ali_sku_values', 'ali_sku_property_id')) {
            Schema::table('ali_sku_values', function (Blueprint $table) {
                $table->dropForeign(['ali_sku_property_id']);
            });
        }
        if (!Schema::hasColumn('ali_sku_values', 'ali_category_id')) {
            Schema::table('ali_sku_values', function (Blueprint $table) {
                $table->unsignedBigInteger('ali_category_id')->nullable()->after('id');
            });
        }
    }

    public function down(): void
    {
        Schema::table('ali_sku_values', function (Blueprint $table) {
            $table->foreign('ali_sku_property_id')->references('id')->on('ali_sku_values');
            $table->dropColumn(['ali_category_id']);
        });
    }
};
