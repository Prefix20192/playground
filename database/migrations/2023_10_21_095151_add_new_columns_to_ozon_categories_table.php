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
        Schema::table('ozon_categories', function (Blueprint $table) {
            $table->boolean('disabled')->nullable()->after('name');
            $table->boolean('final')->default(false)->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ozon_categories', function (Blueprint $table) {
            $table->dropColumn(['disabled']);
        });
    }
};
