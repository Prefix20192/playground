<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tmp_ozon_product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('market_id');
            $table->foreignId('market_card_product_id')->nullable();
            $table->bigInteger('ozon_product_id')->comment('Идентификатор товара ozon')->index();

            $table->integer('height')->comment('Высота упаковки');
            $table->integer('depth')->comment('Глубина');
            $table->integer('width')->comment('Ширина упаковки');
            $table->string('dimension_unit', 10)->comment('Единица измерения габаритов: mm, cm, in');

            $table->integer('weight')->comment('Вес товара в упаковке');
            $table->string('weight_unit')->comment('Единица измерения веса');

            $table->json('pdf_list')->nullable()->comment('Массив PDF-файлов');

            $table->json('attributes')->comment('Массив характеристик товара');
            $table->json('complex_attributes')->nullable()->comment('Массив вложенных характеристик');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tmp_ozon_product_attributes');
    }
};
