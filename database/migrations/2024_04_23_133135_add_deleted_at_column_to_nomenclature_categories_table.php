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
//            Schema::connection('pgsql')->table('nomenclature_categories', function (Blueprint $table) {
//                $table->softDeletes();
//            });
//        }
//
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->table('nomenclature_categories', function (Blueprint $table) {
//            $table->dropSoftDeletes();
//        });
//    }
};
