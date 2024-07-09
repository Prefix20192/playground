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
//        Schema::connection('pgsql')->create('category_property_list', function (Blueprint $table) {
//            $table->unsignedBigInteger('property_id')->unique();
//            $table->json('values')->comment('список значений для select, multiselect');
//
//            $table->foreign('property_id')
//                ->references('id')
//                ->on('nomenclature_category_properties');
//        });
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->dropIfExists('category_property_list');
//    }
};
