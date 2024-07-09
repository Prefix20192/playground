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
        Schema::table('ozon_values', function (Blueprint $table) {
            $table->unique(['ozon_category_id', 'ozon_attribute_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ozon_values', function (Blueprint $table) {
            $table->dropUnique(['ozon_category_id', 'ozon_attribute_id']);
        });
    }
};
