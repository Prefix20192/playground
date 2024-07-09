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
//        Schema::connection('pgsql')->create('article_length_restrictions', function (Blueprint $table) {
//            $table->unsignedBigInteger('category_id');
//            $table->unsignedBigInteger('brand_id');
//            $table->integer('length')->comment('максимальная длина артикула для бренда в связке с определенной категорией');
//
//            $table->unique(['category_id', 'brand_id', 'length']);
//
//            $table->foreign('category_id')->references('id')->on('nomenclature_categories');
//            $table->foreign('brand_id')->references('id')->on('brands');
//        });
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->dropIfExists('article_length_restrictions');
//    }
};
