<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('ali_category_ali_property');
        Schema::dropIfExists('ali_category_ali_sku_property');
        Schema::dropIfExists('ozon_attribute_ozon_category');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('ozon_attribute_ozon_category', function (Blueprint $table) {
            $table->unsignedBigInteger('ozon_attribute_id');
            $table->unsignedBigInteger('ozon_category_id');
            $table->primary(['ozon_attribute_id', 'ozon_category_id']);
        });
        Schema::create('ali_category_ali_sku_property', function (Blueprint $table) {
            $table->unsignedBigInteger('ali_category_id');
            $table->unsignedBigInteger('ali_sku_property_id');
            $table->primary(['ali_category_id', 'ali_sku_property_id']);
        });
        Schema::create('ali_category_ali_property', function (Blueprint $table) {
            $table->unsignedBigInteger('ali_category_id');
            $table->unsignedBigInteger('ali_property_id');
            $table->primary(['ali_category_id', 'ali_property_id']);
        });
    }
};
