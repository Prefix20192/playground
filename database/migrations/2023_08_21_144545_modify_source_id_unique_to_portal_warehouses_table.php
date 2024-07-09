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
        Schema::table('portal_warehouses', function (Blueprint $table) {
            $table->integer('source_id')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portal_warehouses', function (Blueprint $table) {
            $table->dropUnique('portal_warehouses_source_id_unique');
        });
    }
};
