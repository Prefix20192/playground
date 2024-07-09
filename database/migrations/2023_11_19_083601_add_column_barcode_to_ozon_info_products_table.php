<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ozon_info_products', function (Blueprint $table) {
            $table->string('barcode')->nullable()->after('offer_id');
        });
    }

    public function down(): void
    {
        if (Schema::hasColumn('ozon_info_products', 'barcode')) {
            Schema::table('ozon_info_products', function (Blueprint $table) {
                $table->dropColumn('barcode');
            });
        }
    }
};
