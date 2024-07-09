<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('market_card_product_expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->unsignedBigInteger('market_card_product_id');
            $table->float('min_price')->comment('минимальная цена расчитанная проверочным калькулятором');
            $table->float('price')->comment('окончательная цена');
            $table->float('old_price')->comment('цена до скидки');
            $table->float('marketplace_cost')->comment('посчитанные расходы');
            $table->json('marketplace_cost_values')->comment('значения с описание расходов');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('market_card_product_expenses');
    }
};
