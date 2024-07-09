<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marketplace_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marketplace_id')->comment('id маркетплейса');
            $table->string('name')->comment('наименование атрибута');
            $table->string('slug')->comment('url');
            $table->text('description')->nullable()->comment('описание поля');
            $table->string('type')->comment('тип вводимых данных');
            $table->boolean('is_required')->default(false)->comment('флаг обязательно для заполнения или нет');
            $table->json('value')->nullable()->comment('значение по умолчанию');
            $table->unsignedBigInteger('created_by')->nullable()->comment('пользователь добавивший поле');
            $table->unsignedBigInteger('modified_by')->nullable()->comment('пользователь редактирующий поле');
            $table->timestamps();

            $table->foreign('marketplace_id')->references('id')->on('marketplaces')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by')->references('id')->on('users')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('modified_by')->references('id')->on('users')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('marketplace_fields');
    }
};
