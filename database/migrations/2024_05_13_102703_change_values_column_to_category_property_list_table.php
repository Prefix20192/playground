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
//        Schema::connection('pgsql')->table('category_property_list', function (Blueprint $table) {
//            $table->dropUnique(['property_id']);
//            $table->text('values')->change();
//            $table->unique(['property_id', 'values']);
//        });
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->table('category_property_list', function (Blueprint $table) {
//            $table->dropUnique(['property_id', 'values']);
//            $table->json('values')->change();
//            $table->unique(['property_id']);
//        });
//    }
};
