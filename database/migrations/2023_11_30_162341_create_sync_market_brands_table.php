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
        Schema::create('sync_market_brands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->json('brand_list');
            $table->timestamps();
            $table->index('market_id');
            $table->foreign('market_id')->on('markets')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sync_market_brands');
    }
};
