<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('mysql')->create('tmp_ozon_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->unsignedBigInteger('marketplace_product_id');

            $table->string('name');

            $table->integer('description_category_id')->nullable();
            $table->integer('type_id')->nullable();

            $table->string('brand')->nullable();
            $table->string('article');

            $table->integer('depth')->comment('длина');
            $table->integer('height')->comment('высота');
            $table->integer('width')->comment('ширина');
            $table->integer('weight')->comment('вес');
            $table->float('volume', 10, 6)->default(0.0);
            $table->float('volume_weight',4,1)->default(0.0);

            $table->integer('marketing_price')->default(0);
            $table->integer('min_price');
            $table->integer('recommended_price')->default(0);
            $table->integer('premium_price')->default(0);
            $table->integer('price');
            $table->integer('old_price');
            $table->json('price_indexes')->nullable();

            $table->bigInteger('sku')->default(0);
            $table->bigInteger('fbo_sku')->default(0);
            $table->bigInteger('fbs_sku')->default(0);

            $table->string('primary_image');
            $table->json('images')->nullable();
            $table->json('images360')->nullable();

            $table->json('pdf_list')->nullable();
            $table->json('attributes')->nullable();
            $table->json('complex_attributes')->nullable();

            $table->json('errors')->nullable();
            $table->json('commissions')->nullable();
            $table->boolean('is_visible')->default(false);
            $table->boolean('is_archived')->default(false);

            $table->timestamp('product_created_at')->nullable();
            $table->timestamp('product_updated_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tmp_ozon_products');
    }
};
