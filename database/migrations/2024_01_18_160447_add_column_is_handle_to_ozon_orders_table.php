<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ozon_orders', function (Blueprint $table) {
            $table->boolean('is_portal_handle')->default(false)
                ->after('tracking_number')
                ->comment('флаг обработки заказа через портал');
        });
    }

    public function down(): void
    {
        Schema::table('ozon_orders', function (Blueprint $table) {
            $table->dropColumn('is_portal_handle');
        });
    }
};
