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
        Schema::table('pricing_article_brands', function (Blueprint $table) {
            $table->unsignedBigInteger('market_card_product_id')
                ->nullable()
                ->after('market_id')
                ->comment('Добавить связь с ккт.');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pricing_article_brands', function (Blueprint $table) {
            $table->dropColumn(['market_card_product_id']);
        });
    }
};
