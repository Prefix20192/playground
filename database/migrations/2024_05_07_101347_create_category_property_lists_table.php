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
//        Schema::connection('pgsql')->create('category_property_lists', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('category_property_id')->unique();
//            $table->json('list')->comment('список значений для характеристики категории');
//            $table->softDeletes();
//
//            $table->foreign('category_property_id')
//                ->references('id')
//                ->on('nomenclature_category_properties')
//                ->onDelete('cascade');
//        });
//    }
//
//    /**
//     * Reverse the migrations.
//     */
//    public function down(): void
//    {
//        Schema::connection('pgsql')->dropIfExists('category_property_lists');
//    }
};
