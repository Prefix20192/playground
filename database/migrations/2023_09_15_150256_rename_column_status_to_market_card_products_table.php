<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('market_card_products', 'status')) {
            Schema::table('market_card_products', function (Blueprint $table) {
                $table->renameColumn('status', 'main_status');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('market_card_products', 'main_status')) {
            Schema::table('market_card_products', function (Blueprint $table) {
                $table->renameColumn('main_status', 'status');
            });
        }
    }
};
