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
        if (!Schema::hasTable('nomenclature_warehouse')) {
            Schema::create('nomenclature_warehouse', function (Blueprint $table) {
                $table->foreignId('warehouse_id')->constrained('portal_warehouses')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('nomenclature_warehouse')) {
            Schema::dropIfExists('nomenclature_warehouse');
        }
    }
};
