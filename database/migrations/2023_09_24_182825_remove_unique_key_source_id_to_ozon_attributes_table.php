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
        if (Schema::hasColumn('ozon_attributes', 'source_id')) {
            Schema::table('ozon_attributes', function (Blueprint $table) {
                $table->dropUnique(['source_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ozon_attributes', function (Blueprint $table) {
            $table->unique(['source_id']);
        });
    }
};
