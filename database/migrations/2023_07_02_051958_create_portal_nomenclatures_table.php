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
        Schema::create('portal_nomenclatures', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name')->comment('наименование бренда');
            $table->string('article')->comment('артикул товара');
            $table->string('nom_name')->nullable()->comment('наименование номенклатуры');
            $table->integer('measure_id')->nullable()->comment('единица измерения');
            $table->text('certificate')->nullable()->comment('сертификат товара');
            $table->float('size_length', 9,3)->default(0.000)->nullable()->comment('длина (мм)');
            $table->float('size_width', 9, 3)->default(0.000)->nullable()->comment('ширина (мм)');
            $table->float('size_height', 9, 3)->default(0.000)->nullable()->comment('высота (мм)');
            $table->float('net_weight', 8, 2)->default(0.00)->nullable()->comment('вес нетто (гр)');
            $table->float('gross_weight', 8, 2)->default(0.00)->nullable()->comment('вес брутто (кг)');
            $table->float('volume', 8, 6)->default(0.000000)->nullable()->comment('объем (м3)');
            $table->string('image')->nullable()->comment('изображение товара с портала');
            $table->text('description')->nullable()->comment('описание товара');
            $table->string('multi_sale')->nullable();
            $table->string('multi_complect')->nullable();
            $table->string('multi_pack')->nullable();
            $table->json('nomenclature_timing')->nullable()->comment('срок годности, сроки службы, гарантийные сроки');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portal_nomenclatures');
    }
};
