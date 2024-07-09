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
        Schema::create('parse_ozon_product_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->bigInteger('product_id');
            $table->string('offer_id');
            $table->boolean('is_fbo_visible')->default(false);
            $table->boolean('is_fbs_visible')->default(false);
            $table->boolean('archived')->default(false);
            $table->boolean('is_discounted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parse_ozon_product_list');
    }
};
