<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('portal_orders', 'source_order_id')) {
            Schema::table('portal_orders', function (Blueprint $table) {
                $table->renameColumn('source_order_id', 'marketplace_order_id');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('portal_orders', 'marketplace_order_id')) {
            Schema::table('portal_orders', function (Blueprint $table) {
                $table->renameColumn('marketplace_order_id', 'source_order_id');
            });
        }
    }
};
