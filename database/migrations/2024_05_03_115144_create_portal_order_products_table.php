<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('mysql')->create('portal_order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portal_order_id')->comment('id ');
            $table->bigInteger('order_product_id')->comment('Портальный id товара в заказе.');
            $table->bigInteger('nomenclature_id');
            $table->bigInteger('pred_product_id')->comment('id товара на складе.');
            $table->string('product_name')->nullable();
            $table->integer('measure_id')->nullable()->comment('единицы измерения');
            $table->string('measure_name')->nullable()->comment('значение измерения');
            $table->float('price', 10,2)->comment('Цена на товар');
            $table->integer('quantity')->default(0);
            $table->string('brand', 100);
            $table->string('article', 150);
            $table->string('product_description')->nullable();
            $table->json('barcodes')->nullable();
            $table->json('product_statuses')->comment('статусы товара, если quantity > 0 статусы для каждого товара');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portal_order_products');
    }
};
