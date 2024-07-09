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
//        Schema::connection('pgsql')->create('nomenclature_category_properties', function (Blueprint $table) {
//            $table->id();
//            $table->string('name', 255);
//            $table->text('description');
//            $table->string('type', 11)->comment('тип аттрибута, смотреть AttributeTypesEnum');
//            $table->boolean('is_required')->default(false)->comment('обязательно к заполнению');
//            $table->softDeletes();
//        });
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->dropIfExists('nomenclature_category_properties');
//    }
};
