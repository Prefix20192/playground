<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('market_card_products', function (Blueprint $table) {
            $table->json('local_expense')->nullable()->after('price_different')->comment('Расходы расчитанные проверочным калькулятором');
            $table->json('marketplace_expense')->nullable()->after('price_different')->comment('Расходы полученные с площадки');
        });
    }

    public function down(): void
    {
        Schema::table('market_card_products', function (Blueprint $table) {
            $table->dropColumn(['local_expense', 'marketplace_expense']);
        });
    }
};
