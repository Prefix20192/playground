<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('mysql')->dropIfExists('ozon_info_products');

        Schema::connection('mysql')->create('ozon_info_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->unsignedBigInteger('market_card_product_id')->nullable();
            $table->bigInteger('source_product_id')->default(0);
            $table->string('name')->nullable();
            $table->string('offer_id');
            $table->string('barcode')->nullable();
            $table->json('barcodes')->nullable();
            $table->string('dimension_unit')->default('mm');
            $table->string('vat')->default('0.20')->comment('НДС');
            $table->string('currency_code')->default('RUB');
            $table->string('service_type')->default('IS_CODE_SERVICE');
            $table->string('rating')->nullable();
            $table->integer('height')->nullable()->comment('высота');;
            $table->integer('depth')->nullable()->comment('глубина, длина');;
            $table->integer('width')->nullable()->comment('ширина');
            $table->integer('weight')->nullable()->comment('вес');
            $table->string('weight_unit')->default('g')->nullable();
            $table->float('volume_weight', 6, 2)->nullable();
            // category
            $table->integer('old_category_id')->nullable();
            $table->integer('description_category_id')->nullable();
            $table->integer('type_id')->nullable();
            // price
            $table->float('buybox_price', 10, 2)->nullable()->comment('Цена главного предложения');
            $table->float('marketing_price', 10, 2)->nullable()->comment('Цена на товар с учётом всех акций. Это значение будет указано на витрине Ozon.');
            $table->float('min_ozon_price', 10, 2)->nullable()->comment('Минимальная цена на аналогичный товар на Ozon.');
            $table->float('old_price', 10, 2)->nullable()->comment('цена до скидки');
            $table->float('premium_price', 10, 2)->nullable()->comment('Цена для клиентов с подпиской Ozon Premium.');
            $table->float('price', 10, 2)->nullable()->comment('Цена после скидки.');
            $table->float('recommended_price', 10, 2)->nullable()->comment('Цена на товар, рекомендованная системой на основании схожих предложений.');
            $table->float('min_price', 10, 2)->nullable()->comment('Минимальная цена товара после применения акций.');
            $table->json('price_indexes')->nullable()->comment('Ценовые индексы товара.');
            // skus
            $table->bigInteger('sku')->default(0)->comment('SKU товара.');
            $table->bigInteger('fbo_sku')->default(0)->comment('SKU товара, который продаётся со склада Ozon (FBO).');
            $table->bigInteger('fbs_sku')->comment('SKU товара, который продаётся со склада продавца (FBS и rFBS).');

            $table->string('primary_image')->nullable();
            $table->json('images')->nullable();
            $table->json('image_group_id')->nullable();
            $table->json('images360')->nullable();
            $table->json('color_image')->nullable();

            $table->json('pdf_list')->nullable();
            $table->json('attributes')->nullable();
            $table->json('complex_attributes')->nullable();

            $table->json('errors')->nullable();
            $table->json('commissions')->nullable();

            $table->boolean('visible')->default(false)->comment('Если товар выставлен на продажу.');
            $table->boolean('is_archived')->default(false);
            $table->boolean('is_autoarchived')->default(false);
            $table->boolean('is_discounted')->default(false);
            $table->boolean('has_discounted_item')->default(false);
            $table->boolean('is_kgt')->default(false);

            $table->timestamp('product_created_at')->nullable();
            $table->timestamp('product_updated_at')->nullable();
            $table->boolean('is_sync')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('ozon_info_products');
    }
};
