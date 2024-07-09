<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('market_card_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->unsignedBigInteger('card_product_id');
            $table->string('name', 250)->index();
            $table->string('article', 100)->index();
            $table->string('brand_name');
            $table->string('unique_key')->comment('уникальный ключ из brand_name и article');
            $table->float('price', 10,2)->comment('цена высчитывается из конечной и расходов на площадку');
            $table->float('old_price', 10,2)->comment('+ 30% от конечной цены');
            $table->float('price_different')->default(0);
            $table->integer('status');
            $table->integer('quantity')->default(0)->comment('остаток высчитывается из подключенных складов магазина');
            $table->json('data_send')->nullable()->comment('json с данными на площадке');
            $table->unsignedBigInteger('created_by')->nullable()->comment('пользователь который разместил данные на МП');
            $table->unsignedBigInteger('modified_by')->nullable()->comment('пользователь редактор');
            $table->timestamps();

            $table->foreign('market_id')->references('id')->on('markets')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('card_product_id')->references('id')->on('card_products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('modified_by')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('market_card_products');
    }
};
