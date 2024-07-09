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
//        Schema::connection('pgsql')->table('brands', function (Blueprint $table) {
//            $table->unsignedBigInteger('brand_attribute_id')->nullable();
//
//            $table->foreign('brand_attribute_id')
//                ->references('id')
//                ->on('brand_attributes')
//                ->cascadeOnDelete();
//        });
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->table('brands', function (Blueprint $table) {
//            $table->dropForeign(['brand_attribute_id']);
//
//            $table->dropColumn('brand_attribute_id');
//        });
//    }
};
