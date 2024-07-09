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
        Schema::create('ozon_seller_transactions_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ozon_reports_id');
            $table->dateTime('transaction_date')->nullable()->comment('Дата транзакции');
            $table->string('type')->nullable()->comment('Тип/Тип операции');
            $table->string('number_order')->nullable()->comment('Номер заказа/Номер отправления или идентификатор услуги');
            $table->dateTime('date_order')->nullable()->comment('Дата заказа');
            $table->string('name_product')->nullable()->comment('Названия товаров');
            $table->float('sum_order', 14, 2)->nullable()->comment('Сумма заказа');
            $table->float('commission', 14, 2)->nullable()->comment('Коммиссия');
            $table->float('delivery_charge', 14, 2)->nullable()->comment('Плата за доставку');
            $table->float('payment_for_return', 14, 2)->nullable()->comment('Плата за доставку возврата');
            $table->float('total', 14, 2)->nullable()->comment('Итого');
            $table->date('accrual_date')->nullable()->comment('Дата начисления');
            $table->string('shipping_warehouse')->nullable()->comment('Склад отгрузки');
            $table->date('date_of_service')->nullable()->comment('Дата принятия заказа в обработку или совершения услуги');
            $table->string('list_sku')->nullable()->comment('Список SKU');
            $table->string('list_service_name')->nullable()->comment('Список товаров или название услуги');
            $table->float('price_products_for_departure', 14, 2)->nullable()->comment('Цена товаров в отправлении');
            $table->timestamps();
            $table->foreign('ozon_reports_id')->references('id')->on('ozon_reports');
            $table->unique(['type', 'number_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ozon_seller_transactions_reports');
    }
};
