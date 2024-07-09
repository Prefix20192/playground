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
        Schema::table('ozon_info_products', function (Blueprint $table) {
            $table->json('commissions')->nullable()->comment('комиссия плщадки на товар');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasTable('ozon_info_products'))
        {
            Schema::table('ozon_info_products', function (Blueprint $table) {
                $table->dropColumn('commissions');
            });
        }
    }
};
