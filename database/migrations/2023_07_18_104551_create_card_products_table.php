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
        Schema::create('card_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portal_nomenclature_id')->nullable();
            $table->string('name');
            $table->string('brand_name')->comment('наименование бренда.');
            $table->string('article')->comment('артикул товара.');
            $table->float('size_length', 8,3)->nullable()->comment('длина, с учетом коробки.');
            $table->float('size_height', 8,3)->nullable()->comment('высота, с учетом коробки.');
            $table->float('size_width', 8,3)->nullable()->comment('ширина, с учетом коробки.');
            $table->float('volume_meters')->nullable()->comment('объем в кубических метрах.');
            $table->float('net_weight', 8,3)->nullable()->comment('вес продукта с упаковкой.');
            $table->text('description')->nullable()->comment('описание товара, продукта. Основной текст.');
            $table->string('expiration_date')->nullable()->comment('гарантийные сроки.');
            $table->float('price')->nullable()->comment('цена с учетом скидок. реальная цена.');
            $table->float('old_price')->nullable()->comment('цена без скидок. перечеркнутая цена.');
            $table->string('status')->default(0);
            $table->string('vat')->nullable()->comment('НДС на продукт.');
            $table->json('data')->nullable()->comment('генерируемы json для МП.');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('portal_nomenclature_id')->references('id')->on('portal_nomenclatures')
                ->cascadeOnUpdate();
            $table->foreign('created_by')->references('id')->on('users')
                ->cascadeOnUpdate();
            $table->foreign('modified_by')->references('id')->on('users')
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_products');
    }
};
