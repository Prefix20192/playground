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
        Schema::create('card_product_market', function (Blueprint $table) {
            $table->unsignedBigInteger('card_product_id');
            $table->unsignedBigInteger('market_id');
            $table->primary(['card_product_id', 'market_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_product_market');
    }
};
