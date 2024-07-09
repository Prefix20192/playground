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
        Schema::table('card_product_market', function (Blueprint $table) {
            $table->index('market_id');
            $table->index('card_product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('card_product_market', function (Blueprint $table) {
            if (Schema::hasTable('card_product_market')) {
                $table->dropIndex(['market_id']);
                $table->dropIndex(['card_product_id']);
            }
        });
    }
};
