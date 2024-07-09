<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portal_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->string('unique_key', 100)->nullable()->comment('уникальный ключ товара (hub)');
            $table->string('source_order_id')->nullable()->index()->comment('номер заказа с площадки');
            $table->dateTime('create_date')->comment('дата создания заказа');
            $table->unsignedBigInteger('portal_order_id')->index()->comment('идентификатор заказа портала (присваивается порталом при создании)')->nullable();
            $table->string('order_description', 200)->nullable()->comment('примечание к заказу');
            $table->bigInteger('agreement_id')->comment('идентификатор договора, по которому был создан заказ (портал)');
            $table->string('agreement_name')->comment('наименование договора, по которому был создан заказ (портал)');
            $table->bigInteger('delivery_type_id')->comment('идентификатор типа доставки для заказа (портал)');
            $table->string('delivery_name')->comment('наименование типа доставки для заказа (портал)');
            $table->string('user_name')->comment('пользователь, совершивший заказ (клиент 1С)');
            $table->integer('source_warehouse_id')->comment('уникальный идентификатор склада (портальный)');
            $table->string('warehouse_name')->comment('название склада, с которого были заказаны товары');
            $table->boolean('is_archive')->comment('признак того, что заказ отправлен в архив (портал)');
            $table->dateTime('end_date')->nullable()->comment('дата исполнения заказа (портал).');
            $table->json('order_products')->comment('массив товаров в заказе.');
            $table->timestamps();

            $table->foreign('market_id')->references('id')->on('markets');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portal_orders');
    }
};
