<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('market_card_products', function (Blueprint $table) {
            $table->float('min_price', 10, 2)->nullable()->after('unique_key');
        });
    }

    public function down(): void
    {
        Schema::table('market_card_products', function (Blueprint $table) {
            $table->dropColumn(['min_price']);
        });
    }
};
