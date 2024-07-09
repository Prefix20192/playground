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
        Schema::create('ozon_attribute_ozon_category', function (Blueprint $table) {
            $table->unsignedBigInteger('ozon_attribute_id');
            $table->unsignedBigInteger('ozon_category_id');
            $table->primary(['ozon_attribute_id', 'ozon_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ozon_attribute_ozon_category');
    }
};
