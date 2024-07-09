<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portal_orders', function (Blueprint $table) {
            $table->json('response_data')->nullable()->after('order_description')->comment('ответ с портала');
        });
    }

    public function down(): void
    {
        Schema::table('portal_orders', function (Blueprint $table) {
            $table->dropColumn('response_data');
        });
    }
};
