<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ozon_product_pricing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->string('offer_id');
            $table->unsignedBigInteger('source_product_id');
            $table->unsignedBigInteger('description_category_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->integer('sku')->comment('SKU товара.');
            $table->integer('fbo_sku')->comment('SKU товара.');
            $table->integer('fbs_sku')->comment('SKU товара.');
            $table->boolean('is_kgt')->default(false);
            $table->float('premium_price')->nullable()->comment('Цена для клиентов с подпиской Ozon Premium.');
            $table->float('recommended_price')->nullable()->comment('Цена на товар, рекомендованная системой на основании схожих предложений.');
            $table->float('marketing_price')->nullable()->comment('Цена на товар с учетом всех акций.');
            $table->float('min_price')->nullable()->comment('Минимальная цена товара после применения акций.');
            $table->float('price')->nullable()->comment('Цена товара с учётом скидок.');
            $table->float('old_price')->nullable()->comment('Цена до учёта скидок.');
            $table->float('vat', 3, 2)->nullable()->comment('НДС');
            $table->json('commission_fbo')->nullable();
            $table->json('commission_fbs')->nullable();
            $table->json('commission_rfbs')->nullable();
            $table->string('ozon_price_index')->nullable()->comment('Итоговый ценовой индекс товара.');
            $table->json('external_index_data')->nullable()->comment('Цена товара у конкурентов на других площадках.');
            $table->json('ozon_index_data')->nullable()->comment('Цена товара у конкурентов на Ozon.');
            $table->json('self_marketplaces_index_data')->nullable()->comment('Цена вашего товара на других площадках.');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ozon_product_pricing');
    }
};
