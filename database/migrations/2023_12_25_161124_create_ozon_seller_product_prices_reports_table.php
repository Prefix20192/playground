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
        Schema::create('ozon_seller_product_prices_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ozon_reports_id');
            $table->string('article')->comment('Артикул');
            $table->bigInteger('ozon_product_id')->comment('Ozon id продукта');
            $table->string('name')->nullable()->comment('Название');
            $table->string('status')->nullable()->comment('Статус');
            $table->string('visible_on_ozon')->nullable()->comment('Видимость на OZON');
            $table->integer('commission_amount')->nullable()->comment('Размер комиссии, %');
            $table->integer('delivery_tariff_ozon')->nullable()->comment('Тариф за доставку со склада OZON, руб.');
            $table->integer('delivery_tariff_seller')->nullable()->comment('Тариф за доставку со склада продавца, руб.');
            $table->integer('nds')->nullable()->comment('НДС, %');
            $table->float('price_before_discount', 14, 2)->nullable()->comment('Цена до скидки, руб.');
            $table->float('current_discounted_price', 14, 2)->nullable()->comment('Текущая цена (со скидкой), руб.');
            $table->integer('discount')->nullable()->comment('Скидка, %');
            $table->float('discount_rub', 14, 2)->nullable()->comment('Скидка, руб.');
            $table->float('price_including_promotion', 14, 2)->nullable()->comment('Цена с учетом акции, руб.');
            $table->integer('discount_including_promotion')->nullable()->comment('Скидка с учетом акции, %');
            $table->float('discount_including_promotion_rub',14 ,2)->nullable()->comment('Скидка с учетом акции, руб.');
            $table->float('price_ozon_premium',14 ,2)->nullable()->comment('Цена с Ozon Premium, руб.');
            $table->float('market_price',14 ,2)->nullable()->comment('Рыночная цена, руб.');
            $table->float('min_price_ozon',14 ,2)->nullable()->comment('Минимальная цена на Ozon');
            $table->float('recommended_price',14 ,2)->nullable()->comment('Рекомендованная цена, руб.');
            $table->float('roduct_price_index',3 ,2)->nullable()->comment('Ценовой индекс товара');
            $table->string('setting_recommended_price')->nullable()->comment('Настройка автоматического применения рекомендованной цены');
            $table->string('setting_recommended_market_price')->nullable()->comment('Настройка автоматического применения рыночной цены');
            $table->float('min_recommended_price', 14, 2)->nullable()->comment('Минимальное значение рекомендованной цены, руб.');
            $table->float('min_recommended_market_price', 14, 2)->nullable()->comment('Минимальное значение рыночной цены, руб.');
            $table->string('link_on_recommended_price')->nullable()->comment('Ссылка на рекомендованную цену');
            $table->string('setting_up_prepayment')->nullable()->comment('Настройка предоплаты');
            $table->string('automatic_promotion')->nullable()->comment('Настройка автоматического добавления в акции');
            $table->integer('discount_ozon_premiun')->nullable()->comment('Скидки с Ozon Premium, %');
            $table->string('automatically_market_price')->nullable()->comment('Автоматически применять рыночную цену');
            $table->string('set_up_prepayment')->nullable()->comment('Настроить предоплату');
            $table->string('automatically_add_promotions')->nullable()->comment('Автоматически добавлять в акции');
            $table->string('link_on_market_price')->nullable()->comment('Ссылка на рыночную цену');
            $table->float('volumetric_weight')->nullable()->comment('Объемный вес, кг');
            $table->integer('order_assembly_fbo')->nullable()->comment('Сборка заказа, FBO');
            $table->integer('backbone_min_fbo')->nullable()->comment('Магистраль, минимум, FBO');
            $table->integer('backbone_max_fbo')->nullable()->comment('Магистраль, максимум, FBO');
            $table->integer('discount_and_current_price')->nullable()->comment('Скидка, %/Рассчитывается от цены до скидки и текущей цены');
            $table->integer('discount_and_current_price_rub')->nullable()->comment('Скидка, руб./Рассчитывается от цены до скидки и текущей цены');
            $table->integer('discount_and_price_including_promotion')->nullable()->comment('Скидка, руб./Рассчитывается от цены до скидки и цены с учетом акции');
            $table->integer('discount_and_price_including_promotion_rub')->nullable()->comment('Скидка, руб./Рассчитывается от цены до скидки и цены с учетом акции');
            $table->timestamps();
            $table->foreign('ozon_reports_id')->references('id')->on('ozon_reports');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ozon_seller_product_prices_reports');
    }
};
