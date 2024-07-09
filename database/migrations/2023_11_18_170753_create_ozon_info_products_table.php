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
        Schema::create('ozon_info_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->bigInteger('source_product_id');
            $table->string('name');
            $table->string('offer_id')->comment('артикул в нашей системе');
            $table->json('barcodes', 100)->nullable();
            $table->bigInteger('category_id')->nullable()->comment('id категории устаревший метод');
            $table->bigInteger('description_category_id')->nullable()->comment('id категории устаревший метод');
            $table->string('primary_image')->nullable();
            $table->json('images')->nullable();
            $table->string('marketing_price')->nullable()->comment('Цена на товар с учетом всех акций. Это значение будет указано на витрине Ozon.');
            $table->string('old_price')->nullable()->comment('Цена до учёта скидок. На карточке товара отображается зачёркнутой.');
            $table->string('premium_price')->nullable()->comment('Цена для клиентов с подпиской ozon premium.');
            $table->string('price')->nullable()->comment('Цена товара с учётом скидок — это значение показывается на карточке товара.');
            $table->json('errors')->nullable();
            $table->string('vat')->nullable();
            $table->boolean('visible')->nullable()->comment('Настройки видимости товара.');
            $table->string('price_index')->nullable()->comment('Ценовые индексы товара.');
            $table->json('commissions')->nullable();
            $table->double('volume_weight', 5, 5)->nullable()->comment('Объёмный вес товара.');
            $table->boolean('is_prepayment')->comment('Флаг обязательной предоплаты для товара: true — чтобы купить товар, нужно внести предоплату. false — предоплата необязательна.');
            $table->boolean('is_prepayment_allowed')->comment('Если возможна предоплата.');

            $table->json('status')->nullable()->comment('Описание состояния товара.');
            $table->string('service_type');
            $table->bigInteger('fbo_sku');
            $table->bigInteger('fbs_sku');
            $table->string('currency_code');
            $table->boolean('is_kgt');
            $table->json('discounted_stocks')->comment('Остатки уценённого товара на складе Ozon.');
            $table->boolean('is_discounted')->comment('Признак, является ли товар уценённым:');
            $table->boolean('has_discounted_item')->comment('Признак, что у товара есть уценённые аналоги на складе Ozon.');
            $table->bigInteger('sku')->nullable()->comment('SKU товара.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ozon_info_products');
    }
};
