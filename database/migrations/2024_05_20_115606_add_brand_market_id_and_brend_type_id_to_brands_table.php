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
//            $table->unsignedBigInteger('brand_market_id')->nullable();
//            $table->unsignedBigInteger('brand_type_id')->nullable();
//
//            $table->foreign('brand_market_id')
//                ->references('id')
//                ->on('brand_markets')
//                ->cascadeOnDelete();
//
//            $table->foreign('brand_type_id')
//                ->references('id')
//                ->on('brand_types')
//                ->cascadeOnDelete();
//        });
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->table('brands', function (Blueprint $table) {
//            $table->dropForeign('brand_market_id');
//            $table->dropForeign('brand_type_id');
//            $table->dropColumn(['brand_market_id', 'brand_type_id']);
//        });
//    }
};
