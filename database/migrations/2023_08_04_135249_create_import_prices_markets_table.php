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
        Schema::create('import_prices_markets', function (Blueprint $table) {
            $table->integer('import_prices_id');
            $table->integer('markets_id');
            $table->integer('card_product_id');

            $table->primary(['import_prices_id', 'markets_id', 'card_product_id']);

            $table->float('market_price')->nullable()->comment('цена для конкретного магазина');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_prices_markets');
    }
};
