<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ozon_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->string('code')->comment('Уникальный идентификатор отчёта.')->index();
            $table->string('error')->nullable()->comment('Код ошибки при генерации отчёта.');
            $table->string('file_url')->nullable()->comment('Ссылка на XLSX-файл.');
            $table->string('report_type')->comment('Тип отчёта. Enum class. ')->index();
            $table->string('status')->comment('Статус генерации отчёта. Enum class.')->index();
            $table->json('params')->nullable()->comment('Массив с фильтрами, указанными при создании отчёта продавцом.');
            $table->timestamp('report_created_at')->comment('Дата создания отчёта.');
            $table->timestamps();
            $table->foreign('market_id')->references('id')->on('markets');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ozon_reports');
    }
};
