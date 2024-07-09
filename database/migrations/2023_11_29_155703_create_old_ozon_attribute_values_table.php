<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('old_ozon_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('old_ozon_category_id');
            $table->unsignedBigInteger('old_ozon_attribute_id');
            $table->bigInteger('source_id')->comment('id ozon атрибута.');
            $table->json('value_result')->comment('List values fo select.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('old_ozon_attribute_values');
    }
};
