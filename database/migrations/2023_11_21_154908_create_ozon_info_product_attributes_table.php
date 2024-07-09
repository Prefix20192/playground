<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ozon_info_product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->string('offer_id', 100);
            $table->unsignedBigInteger('source_product_id');
            $table->json('attributes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ozon_info_product_attributes');
    }
};
