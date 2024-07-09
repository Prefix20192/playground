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
//        if (!Schema::hasTable('nomenclature_categories')) {
//            Schema::connection('pgsql')->create('nomenclature_categories', function (Blueprint $table) {
//                $table->id();
//                $table->string('name', 255)->unique();
//                $table->string('path')->nullable();
//                $table->text('description')->nullable();
//                $table->boolean('is_active')->default(1);
//                $table->timestamps();
//            });
//        }
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->dropIfExists('nomenclature_categories');
//    }
};
