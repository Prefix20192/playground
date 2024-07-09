<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
//    protected $connection = 'pgsql';
//
//    public function up(): void
//    {
//        Schema::connection('pgsql')->create('nomenclatures', function (Blueprint $table) {
//            $table->id();
//            $table->string('name', 255);
//            $table->unsignedBigInteger('brand_id');
//            $table->string('article', 50);
//            $table->unsignedBigInteger('category_id');
//            $table->unsignedBigInteger('measure_id');
//            $table->unsignedBigInteger('responsible_id')->comment('Ответственный номенклатуры, фиксирует ответственного по ассортименту, заказам, ведению бренда, категорийного менеджера.');
//            $table->unsignedBigInteger('barcode_id');
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('brand_id')
//                ->references('id')
//                ->on('brands');
//
//            $table->foreign('category_id')
//                ->references('id')
//                ->on('nomenclature_categories');
//
//            $table->foreign('measure_id')
//                ->references('id')
//                ->on('measures');
//
//            $table->foreign('barcode_id')
//                ->references('id')
//                ->on('barcodes');
//        });
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->dropIfExists('nomenclatures');
//    }
};
