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
//        Schema::connection('pgsql')->create('category_property_form_values', function (Blueprint $table) {
//            $table->unsignedBigInteger('category_id');
//            $table->unsignedBigInteger('form_id');
//            $table->unsignedBigInteger('property_id');
//            $table->text('value')->nullable()->comment('значение  характеристики формы категории');
//
//            $table->unique(['category_id', 'form_id', 'property_id']);
//
//            $table->foreign('category_id')
//                ->references('id')
//                ->on('nomenclature_categories');
//
//            $table->foreign('form_id')
//                ->references('id')
//                ->on('category_property_lists');
//
//            $table->foreign('property_id')
//                ->references('id')
//                ->on('category_property_lists');
//        });
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->dropIfExists('category_property_form_values');
//    }
};
