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
        Schema::table('ozon_attributes', function (Blueprint $table) {
            $table->integer('attribute_complex_id')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ozon_attributes', function (Blueprint $table) {
            $table->boolean('attribute_complex_id')->default(false)->change();
        });
    }
};
