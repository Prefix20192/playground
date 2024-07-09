<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ozon_product_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('market_id');
            $table->foreignId('market_card_product_id')->constrained();
            $table->bigInteger('ozon_product_id')->comment('Идентификатор товара ozon')->index();
            $table->bigInteger('sku')->default(0)->comment('SKU товара.')->index();
            $table->string('name')->comment('Название');
            $table->string('offer_id')->comment('Идентификатор товара в системе продавца — артикул')->index();
            $table->bigInteger('description_category_id')->default(0)->comment('Идентификатор категории ');
            $table->bigInteger('type_id')->default(0)->comment('Идентификатор типа товара');
            $table->string('barcode')->nullable()->comment('Штрихкод');
            $table->json('barcodes')->nullable()->comment('Все штрихкоды товара.');

            $table->string('primary_image')->nullable()->comment('Главное изображение товара');
            $table->string('color_image')->nullable()->comment('Маркетинговый цвет');
            $table->json('images')->comment('Массив ссылок на изображения. Изображения в массиве расположены в порядке их расположения на сайте');
            $table->json('images360')->comment('Массив изображений 360');

            $table->string('vat')->default("0.20")->comment('Ставка НДС для товара');
            $table->integer('min_price')->nullable()->comment('Минимальная цена товара после применения акций.');
            $table->integer('price')->comment('Цена товара с учётом скидок.');
            $table->integer('old_price')->comment('Цена до учёта скидок');
            $table->integer('marketing_price')->comment('Цена на товар с учетом всех акций. Это значение будет указано на витрине Ozon');
            $table->string('currency_code')->default('RUB')->comment('Валюта ваших цен');
            $table->json('price_indexes')->nullable()->comment('Ценовые индексы товара');
            $table->json('sources')->comment('Информация об источниках схожих предложений');
            $table->json('commissions')->comment('Информация о комиссиях');

            $table->string('service_type')->default('IS_CODE_SERVICE');
            $table->float('volume_weight')->comment('Объёмный вес товара');

            $table->json('status')->nullable()->comment('Описание состояния товара');
            $table->json('errors')->comment('Ошибки');

            $table->boolean('is_visible')->comment('Если товар выставлен на продажу');
            $table->json('visibility_details')->nullable()->comment('Настройки видимости товара');

            $table->boolean('is_prepayment')->comment('Флаг обязательной предоплаты для товара');
            $table->boolean('is_prepayment_allowed')->comment('Если возможна предоплата');
            $table->boolean('is_kgt')->comment('Признак крупногабаритного товара.');
            $table->boolean('is_discounted')->comment('Признак, является ли товар уценённым');
            $table->boolean('has_discounted_item')->comment('Признак, что у товара есть уценённые аналоги на складе Ozon');
            $table->boolean('is_archived')->comment('true, если товар архивирован вручную.');
            $table->boolean('is_autoarchived')->comment('true, если товар архивирован автоматически.');

            $table->timestamp('product_created_at')->comment('Дата и время создания товара');
            $table->timestamp('product_updated_at')->comment('Дата последнего обновления товара');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ozon_product_info');
    }
};
