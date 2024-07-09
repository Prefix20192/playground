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
        if (!Schema::connection('mysql')->hasColumn('ozon_info_products', 'status')) {
            Schema::connection('mysql')->table('ozon_info_products', function (Blueprint $table) {
                $table->json('status')->nullable()->after('min_price')
                    ->comment('Статусы товара озон');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::connection('mysql')->hasColumn('ozon_info_products', 'status')) {
            Schema::connection('mysql')->table('ozon_info_products', function (Blueprint $table) {
                $table->dropColumn(['status']);
            });
        }
    }
};
