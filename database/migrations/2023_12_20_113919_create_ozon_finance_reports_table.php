<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ozon_finance_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id')->comment('id магазина');
            $table->bigInteger('report_id')->comment('Идентификатор отчета.');
            $table->timestamp('begin')->comment('Начало периода.');
            $table->timestamp('end')->nullable()->comment('Конец периода.');
            // список отчет
            $table->float('orders_amount', 14, 2)->comment('Сумма цен реализованных товаров.');
            $table->float('returns_amount', 14, 2)->comment('Сумма цен возвращённых товаров.');
            $table->float('commission_amount', 14, 2)->comment('Комиссия Ozon за реализацию товаров.');
            $table->float('services_amount', 14, 2)->comment('Сумма дополнительных услуг.');
            $table->float('item_delivery_and_return_amount', 14, 2)->comment('Сумма услуг логистики.');

            // Детализированная информация.
            $table->json('details');
            $table->timestamps();

            $table->foreign('market_id')->on('markets')->references('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ozon_finance_reports');
    }
};
