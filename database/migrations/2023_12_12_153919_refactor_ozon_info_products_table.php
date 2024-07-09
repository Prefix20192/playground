<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('ozon_info_products');

        Schema::create('ozon_info_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->unsignedBigInteger('market_card_product_id')->nullable();
            $table->string('offer_id')->comment('Артикул в нашей системе');
            $table->string('name')->comment('Название.');
            $table->bigInteger('source_product_id')->comment('Номер задания на формирование документов (id продукта )');
            $table->string('barcode')->nullable()->comment('Штрихкод.');
            $table->json('barcodes')->nullable()->comment('Все штрихкоды товара.');
            $table->bigInteger('category_id')->nullable()->comment('Идентификатор категории.');
            $table->bigInteger('description_category_id')->nullable()->comment('Новый Идентификатор категории.');
            $table->string('color_image')->nullable()->comment('Маркетинговый цвет.');
            $table->json('commissions')->nullable()->comment('Информация о комиссиях.');
            $table->bigInteger('sku')->nullable()->comment('SKU товара.');
            $table->bigInteger('fbo_sku')->nullable()->comment('SKU товара.');
            $table->bigInteger('fbs_sku')->nullable()->comment('SKU товара.');
            $table->string('primary_image')->nullable()->comment('Главное изображение товара.');
            $table->json('images')->nullable()->comment('Массив ссылок на изображения.');
            $table->json('images360')->nullable()->comment('Массив изображений 360.');
            $table->boolean('has_discounted_item')->nullable()->comment('Признак, что у товара есть уценённые аналоги на складе Ozon.');
            $table->boolean('is_discounted')->nullable()->comment('Признак, является ли товар уценённым');
            $table->json('discounted_stocks')->nullable()->comment('Остатки уценённого товара на складе Ozon.');
            $table->boolean('is_kgt')->nullable()->comment('Признак крупногабаритного товара.');
            $table->boolean('is_prepayment')->nullable()->comment('Флаг обязательной предоплаты для товара.');
            $table->boolean('is_prepayment_allowed')->nullable()->comment('Если возможна предоплата');
            $table->string('currency_code', 10)->comment('Валюта ваших цен. Совпадает с валютой, которая установлена в настройках личного кабинета.');
            $table->string('marketing_price')->nullable()->comment('Цена на товар с учетом всех акций. Это значение будет указано на витрине Ozon.');
            $table->string('min_price')->nullable()->comment('Минимальная цена товара после применения акций.');
            $table->string('old_price')->nullable()->comment('Цена до учёта скидок. На карточке товара отображается зачёркнутой.');
            $table->string('premium_price')->nullable()->comment('Цена для клиентов с подпиской.');
            $table->string('price')->nullable()->comment('Цена товара с учётом скидок — это значение показывается на карточке товара.');
            $table->string('recommended_price')->nullable()->comment('Цена на товар, рекомендованная системой на основании схожих предложений.');
            $table->json('price_indexes')->nullable()->comment('Ценовые индексы товара.');
            $table->json('status')->nullable()->comment('Описание состояния товара.');
            $table->json('sources')->nullable()->comment('Информация об источниках схожих предложений.');
            $table->json('stocks')->nullable()->comment('Информация об остатках товара.');
            $table->string('vat')->default('0')->comment('Ставка НДС для товара.');
            $table->json('visibility_details')->nullable()->comment('Настройки видимости товара.');
            $table->boolean('visible')->default(false)->comment('Если товар выставлен на продажу.');
            $table->double('volume_weight', 6,2)->nullable()->comment('Объёмный вес товара.');
            $table->timestamp('product_created_at')->nullable()->comment('Дата и время создания товара.');
            $table->timestamp('product_updated_at')->nullable()->comment('Дата последнего обновления товара.');
            $table->timestamps();
            $table->foreign('market_id')->references('id')->on('markets');
            $table->foreign('market_card_product_id')->references('id')->on('market_card_products')->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ozon_info_products');
    }
};
