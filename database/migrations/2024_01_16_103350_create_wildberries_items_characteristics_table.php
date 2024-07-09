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
        Schema::dropIfExists('wildberries_items_characteristics');
        Schema::create('wildberries_items_characteristics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('charc_id')
                ->unique()
                ->comment('Идентификатор характеристики');
            $table->string('subject_name')->comment('Название предмета');
            $table->unsignedBigInteger('subject_id')->comment('Идентификатор предмета');
            $table->string('name')->comment('Название характеристики');
            $table->boolean('is_required')->comment('true - характеристику необходимо обязательно указать в КТ');
            $table->string('unit_name')->comment('Единица измерения');
            $table->integer('max_count')->comment('Максимальное кол-во значений, которое можно присвоить данной характеристике. Если 0, то нет ограничения.');
            $table->boolean('popular')->comment('Характеристика популярна у пользователей (true - да, false - нет)');
            $table->integer('charc_type')->comment('Тип характеристики (1 и 0 - строка или массив строк; 4 - число или массив чисел)');
            $table->timestamps();

            $table->foreign('subject_id')
                ->references('subject_id')
                ->on('wildberries_items')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wildberries_items_characteristics');
        Schema::dropIfExists('wildberries_items');
    }
};
