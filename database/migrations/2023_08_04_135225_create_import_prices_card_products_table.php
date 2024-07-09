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
        Schema::create('import_prices_card_products', function (Blueprint $table) {
            $table->integer('import_prices_id');
            $table->integer('card_products_id');
            $table->primary(['import_prices_id', 'card_products_id']);

            $table->string('status', 7)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_prices_card_products');
    }
};
