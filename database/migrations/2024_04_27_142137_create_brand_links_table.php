<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //PGSQL
//    protected $connection = 'pgsql';
//
//    public function up(): void
//    {
//        if (!Schema::hasTable('brand_links')) {
//            Schema::connection('pgsql')->create('brand_links', function (Blueprint $table) {
//                $table->id();
//                $table->string('name', 255);
//                $table->string('link', 255);
//                $table->string('lang', 2)->default('ru');
//                $table->unsignedBigInteger('brand_id');
//                $table->foreign('brand_id')
//                    ->references('id')
//                    ->on('brands')
//                    ->onDelete('cascade');
//            });
//        }
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->dropIfExists('brand_links');
//    }
};
