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
        if (Schema::hasColumn('portal_orders', 'unique_key')) {
            Schema::table('portal_orders', function (Blueprint $table) {
                $table->dropColumn('unique_key');
            });
        }

        if (Schema::hasColumn('portal_orders', 'quantity')) {
            Schema::table('portal_orders', function (Blueprint $table) {
                $table->dropColumn('quantity');
            });
        }

        if (Schema::hasColumn('portal_orders', 'portal_nomenclature_id')) {
            Schema::table('portal_orders', function (Blueprint $table) {
                $table->dropColumn('portal_nomenclature_id');
            });
        }
    }
};
