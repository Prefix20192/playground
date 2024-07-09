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
        Schema::create('ozon_seller_products_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ozon_reports_id');
            $table->string('article')->comment('Артикул');
            $table->bigInteger('ozon_product_id')->comment('Ozon Product ID');
            $table->bigInteger('fbo_sku_id')->nullable()->comment('FBO OZON SKU ID');
            $table->bigInteger('fbs_sku_id')->nullable()->comment('FBS OZON SKU ID');
            $table->string('barcode')->nullable()->comment('Barcode');
            $table->text('product_name')->nullable()->comment('Наименование товара');
            $table->string('content_rating')->nullable()->comment('Контент-рейтинг');
            $table->string('brand')->nullable()->comment('Бренд');
            $table->string('product_status')->nullable()->comment('Статус товара');
            $table->string('visible_fbo')->nullable()->comment('Видимость FBO');
            $table->text('reasons_for_hiding_fbo')->nullable()->comment('Причины скрытия FBO (при наличии)');
            $table->string('visible_fbs')->nullable()->comment('Видимость FBS');
            $table->text('reasons_for_hiding_fbs')->nullable()->comment('Причины скрытия FBS (при наличии)');
            $table->dateTime('created_report')->nullable()->comment('Дата создания отчета');
            $table->string('commission_category')->nullable()->comment('Категория комиссии');
            $table->string('product_volume')->nullable()->comment('Объем товара, л');
            $table->string('volume_weight')->nullable()->comment('Объемный вес, кг');
            $table->integer('available_for_sale_fbo')->nullable()->comment('Доступно к продаже по схеме FBO, шт.');
            $table->integer('remove_and_apply_kiz')->nullable()->comment('Вывезти и нанести КИЗ (кроме Твери), шт');
            $table->integer('reserved')->nullable()->comment('Зарезервировано, шт');
            $table->integer('available_for_sale_fbs')->nullable()->comment('Доступно к продаже по схеме FBS, шт.');
            $table->integer('available_for_sale_real_fbs')->nullable()->comment('Доступно к продаже по схеме realFBS, шт.');
            $table->integer('reserved_in_my_warehouses')->nullable()->comment('Зарезервировано на моих складах, шт');
            $table->float('current_price_including_discount', 9, 2)->nullable()->comment('Текущая цена с учетом скидки, ₽');
            $table->float('price_before_discount', 9, 2)->nullable()->comment('Цена до скидки (перечеркнутая цена), ₽');
            $table->float('price_premium',9, 2)->nullable()->comment('Цена Premium, ₽');
            $table->float('market_price', 9, 2)->nullable()->comment('Рыночная цена, ₽');
            $table->text('current_link_market_price')->nullable()->comment('Актуальная ссылка на рыночную цену');
            $table->string('size_nds')->nullable()->comment('Размер НДС, %');
            $table->timestamps();
            $table->foreign('ozon_reports_id')->references('id')->on('ozon_reports');
            $table->unique('ozon_product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ozon_seller_products_reports');
    }
};
