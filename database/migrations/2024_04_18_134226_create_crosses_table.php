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
//        if (!Schema::hasTable('crosses')) {
//            Schema::connection('pgsql')->create('crosses', function (Blueprint $table) {
//                $table->id();
//                $table->unsignedBigInteger('brand_id')->comment('id эталонного бренда');
//                $table->string('name', 255)->unique()->comment('наименование кросс бренда');
//                $table->string('slug');
//                $table->timestamps();
//            });
//        }
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->dropIfExists('crosses');
//    }
};
