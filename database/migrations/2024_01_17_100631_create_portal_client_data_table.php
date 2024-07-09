<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portal_client_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->json('order_product_statuses')->nullable()->comment('статусы товаров в заказах');
            $table->json('delivery_types')->comment('способы доставки');
            $table->json('client_agreements')->comment('договоры пользователя (клиента)');
            $table->json('client_delivery_addresses')->comment('адреса доставки пользователя (клиента)');
            $table->json('return_types')->nullable()->comment('типы возможности возврата товара');
            $table->json('carts')->nullable()->comment('список корзин пользователя');
            $table->timestamps();
            $table->foreign('market_id')->references('id')->on('markets');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portal_client_data');
    }
};
