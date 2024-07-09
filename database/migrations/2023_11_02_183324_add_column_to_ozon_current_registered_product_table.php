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
        Schema::table('ozon_current_registered_products', function (Blueprint $table) {
            $table->bigInteger('old_source_category_id')->nullable()->after('source_product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ozon_current_registered_products', function (Blueprint $table) {
            $table->dropColumn(['old_source_category_id']);
        });
    }
};
