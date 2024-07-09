<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('mysql')->dropIfExists('ozon_product_pricing');
        Schema::connection('mysql')->create('ozon_product_pricing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('market_id');
            $table->foreignId('market_card_product_id')->nullable()->comment('id ккт');
            $table->bigInteger('ozon_product_id');
            $table->string('offer_id');
            $table->float('volume_weight');
            $table->integer('acquiring')->default(0);
            $table->json('price')->nullable()->comment('Цена на товар, весь ценовой диапазон с площадки.');
            $table->json('marketing_action')->nullable()->comment('Маркетинговые акции продавца.');
            $table->json('commissions')->nullable()->comment('Информация о комиссиях.');
            $table->json('price_indexes')->nullable()->comment('Ценовые индексы товара.');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('ozon_product_pricing');
    }
};
