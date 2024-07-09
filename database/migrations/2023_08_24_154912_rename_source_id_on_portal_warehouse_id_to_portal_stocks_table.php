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
        Schema::table('portal_stocks', function (Blueprint $table) {
            $table->renameColumn('source_id', 'portal_warehouse_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portal_stocks', function (Blueprint $table) {
            $table->renameColumn('portal_warehouse_id', 'source_id');
        });
    }
};
