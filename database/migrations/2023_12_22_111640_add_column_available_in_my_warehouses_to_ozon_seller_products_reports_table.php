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
        Schema::table('ozon_seller_products_reports', function (Blueprint $table) {
            $table->integer('available_in_my_warehouses')->nullable()->comment('Доступно на моих складах, шт');
            $table->integer('available_in_ozon_warehouse')->nullable()->comment('Доступно на складе Ozon, шт');
            $table->integer('need_to_be_marked')->nullable()->comment('Из них нужно промаркировать, шт');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ozon_seller_products_reports', function (Blueprint $table) {
            $table->dropColumn(['available_in_my_warehouses', 'available_in_ozon_warehouse', 'need_to_be_marked']);
        });
    }
};
