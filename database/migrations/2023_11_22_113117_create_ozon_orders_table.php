<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ozon_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->json('addressee')->nullable()->comment('Контактные данные получателя.');
            $table->json('analytics_data')->comment('Данные аналитики.');
            $table->json('barcodes')->nullable()->comment('Штрихкоды отправления.');
            $table->json('cancellation')->nullable()->comment('Информация об отмене.');
            $table->json('customer')->nullable()->comment('Данные о покупателе.');
            $table->dateTime('delivering_date')->nullable()->comment('Дата передачи отправления в доставку.');
            $table->json('delivery_method')->nullable()->comment('Метод доставки.');
            $table->json('financial_data')->nullable()->comment('Данные о стоимости товара, размере скидки, выплате и комиссии..');
            $table->dateTime('in_process_at')->nullable()->comment('Дата и время начала обработки отправления.');
            $table->boolean('is_express')->comment('Если использовалась быстрая доставка Ozon Express');
            $table->boolean('is_multibox')->comment('Признак, что в отправлении есть многокоробочный товар и нужно передать количество коробок для него:');
            $table->integer('multi_box_qty')->comment('Количество коробок, в которые упакован товар.');
            $table->bigInteger('order_id');
            $table->string('order_number')->comment('Номер заказа, к которому относится отправление.');
            $table->string('parent_posting_number')->nullable()->comment('Номер родительского отправления, в результате разделения которого появилось текущее.');
            $table->string('posting_number')->nullable()->comment('Номер родительского отправления, в результате разделения которого появилось текущее.');
            $table->json('products')->comment('Список товаров в отправлении.');
            $table->string('prr_option')->nullable()->comment('Код услуги погрузочно-разгрузочных работ:');
            $table->json('requirements')->comment('Cписок продуктов, для которых нужно передать страну-изготовителя, номер грузовой таможенной декларации (ГТД), регистрационный номер партии товара (РНПТ) или маркировку «Честный ЗНАК», чтобы перевести отправление в следующий статус.');
            $table->dateTime('shipment_date')->nullable()->comment('Дата и время, до которой необходимо собрать отправление. Если отправление не собрать к этой дате — оно автоматически отменится.');
            $table->string('status')->comment('Статус отправления: enum class');
            $table->string('substatus')->nullable()->comment('Подстатус отправления');
            $table->string('tpl_integration_type')->comment('Тип интеграции со службой доставки');
            $table->string('tracking_number', 150)->nullable()->comment('Трек-номер отправления.');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ozon_orders');
    }
};
