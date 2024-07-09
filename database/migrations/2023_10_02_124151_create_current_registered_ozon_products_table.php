<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ozon_current_registered_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id')->nullable();
            $table->unsignedBigInteger('source_product_id')->nullable();
            $table->unsignedBigInteger('source_category_id')->nullable();
            $table->string('offer_id');
            $table->string('name');
            $table->boolean('is_visible')->nullable();
            $table->json('data_product');
            $table->json('errors')->nullable();
            $table->json('status')->nullable();
            $table->boolean('is_ready')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ozon_current_registered_products');
    }
};
