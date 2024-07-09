<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void {
        Schema::table('ozon_attributes', function (Blueprint $table) {
            $table->unsignedBigInteger('ozon_category_id')->nullable()->after('id');
            $table->foreign('ozon_category_id')->references('id')->on('ozon_categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void {
        Schema::table('ozon_attributes', function (Blueprint $table) {
            $table->dropForeign('ozon_attributes_ozon_category_id_foreign'); // Drop the foreign key constraint
            // Remove the line below as the column already exists
            // $table->dropColumn('ozon_category_id');
        });
    }
};
