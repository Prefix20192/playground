<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('card_products', 'attribute_data'))
        {
            Schema::table('card_products', function (Blueprint $table)
            {
                $table->dropColumn(['attribute_data']);
            });
        }

        if (Schema::hasColumn('card_products', 'vat'))
        {
            Schema::table('card_products', function (Blueprint $table)
            {
                $table->dropColumn(['vat']);
            });
        }

        Schema::table('card_products', function (Blueprint $table) {
            // RENAME COLUMN
            $table->renameColumn('volume_meters', 'volume');
            // PRODUCT_INFORMATION  (информация о товаре)
            $table->float('premium_price')->nullable('Цена для клиентов с подпиской Ozon Premium.')->after('old_price');
            $table->float('vat')->nullable('Ставка НДС для товара: 0 — не облагается НДС, 0.1 — 10%, 0.2 — 20%. ozon')->after('premium_price');
            $table->string('currency_code', 64)->nullable()->comment('Валюта ваших цен. ozon')->after('vat');
            $table->json('pdf_list')->nullable()->comment('Список PDF-файлов. ozon')->after('currency_code');
            $table->string('service_type', 64)->default('IS_CODE_SERVICE')->comment('Тип сервиса.')->after('pdf_list');
            $table->string('language')->default('ru')->nullable()->comment('Язык карточки товара по умолчани. aliexpress')->after('service_type');
            $table->integer('inventory')->default(0)->comment('Oстаток товара на складе от 1 до 999999. aliexpress')->after('language');
            // DIMENSIONS_WEIGHT    (габариты и вес)
            $table->string('weight_unit', 64)->nullable()->comment('Единица измерения веса. ozon')->after('volume_meters');
            $table->string('dimension_unit', 64)->nullable()->comment('Единица измерения габаритов. ozon')->after('weight_unit');
            $table->string('product_unit', 64)->nullable()->comment('Единица измерения товара. aliexpress')->after('dimension_unit');
            // MEDIA                (медиа раздел)
            $table->string('preview_image')->nullable()->comment('Изображение превью.')->after('language');
            $table->json('images')->nullable()->comment('Массив ссылок с изображениями.')->after('preview_image');
            // UNDEFINED            (не определено)
            $table->string('freight_template_id')->nullable()->comment('Идентификатор шаблона доставки. Подключается в магазине продавца. aliexpress')->after('images');
            // CHANGE COLUMN
            $table->float('volume_meters', 6, 6)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_products');
    }
};
