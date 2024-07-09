<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('card_products', 'volume_meters')) {
            Schema::table('card_products', function (Blueprint $table) {
                $table->dropColumn(['volume_meters']);
            });
        }

        Schema::table('card_products', function (Blueprint $table) {
            $table->float('volume_meters', 6, 6)->nullable()->after('net_weight');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_products');
    }
};
