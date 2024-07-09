<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('ozon_info_products')) {
            Schema::dropIfExists('ozon_info_products');
        }

        Schema::create('ozon_info_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->bigInteger('ozon_product_id');
            $table->string('barcode')->nullable();
            $table->bigInteger('old_category_id')->nullable();
            $table->string('name')->index();
            $table->string('offer_id', 150)->index();
            $table->integer('height');
            $table->integer('depth');
            $table->integer('width');
            $table->string('dimension_unit', 10);
            $table->integer('weight');
            $table->string('weight_unit', 10);
            $table->json('images')->nullable();
            $table->json('image_group_id')->nullable();
            $table->json('images360')->nullable();
            $table->json('pdf_list')->nullable();
            $table->json('attributes');
            $table->json('complex_attributes');
            $table->string('color_image')->nullable();
            $table->string('last_id')->nullable();
            $table->string('description_category_id');
            $table->timestamps();

            $table->foreign('market_id')->references('id')->on('markets');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ozon_info_products');
    }
};
