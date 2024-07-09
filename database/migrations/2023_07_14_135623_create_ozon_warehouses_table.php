<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ozon_warehouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id')
                ->comment('id магазина');

            $table->bigInteger('ozon_warehouse_id')
                ->comment('Идентификатор склада зарегистрированного в ozon');

            $table->string('name', 50);

            $table->boolean('is_rfbs')->default(false)
                ->comment('Признак работы склада по схеме rFBS');

            $table->boolean('is_able_to_set_price')->default(false);

            $table->boolean('has_entrusted_acceptance')->default(false)
                ->comment('Признак доверительной приёмки. true, если доверительная приёмка включена на складе.');

            $table->json('first_mile_type')
                ->comment('Первая миля FBS.');

            $table->boolean('is_kgt')
                ->comment('Признак, что склад принимает крупногабаритные товары.');

            $table->boolean('can_print_act_in_advance')->default(false)
                ->comment('Возможность печати акта приёма-передачи заранее. true, если печатать заранее возможно.');

            $table->integer('min_working_days')
                ->comment('Возможность печати акта приёма-передачи заранее. true, если печатать заранее возможно.');

            $table->boolean('is_karantin')
                ->comment('Признак, что склад не работает из-за карантина.');

            $table->boolean('has_postings_limit')
                ->comment('Признак наличия лимита минимального количества заказов. true, если лимит есть.');

            $table->integer('postings_limit')
                ->comment('Значение лимита. -1, если лимита нет.');

            $table->json('working_days')
                ->comment('Количество рабочих дней склада.');

            $table->bigInteger('min_postings_limit')
                ->comment('Минимальное значение лимита — количество заказов, которые можно привезти в одной поставке.');

            $table->boolean('is_timetable_editable')->default(false)
                ->comment('Признак, что можно менять расписание работы складов.');

            $table->string('status')->comment('Статус склада.');
            $table->timestamps();

            $table->foreign('market_id')->references('id')->on('markets')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ozon_warehouses');
    }
};
