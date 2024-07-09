<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('portal_stocks', function (Blueprint $table) {
            $table->dropUnique('warehouses_nomenclature_unique');
            $table->unique(['source_nomenclature_id', 'portal_warehouse_id', 'product_id'], 'warehouses_nomenclature_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portal_stocks', function (Blueprint $table) {
            $table->dropUnique('warehouses_nomenclature_unique');
            $table->unique(['source_nomenclature_id', 'portal_warehouse_id', 'unique_key'], 'warehouses_nomenclature_unique');
        });
    }
};
