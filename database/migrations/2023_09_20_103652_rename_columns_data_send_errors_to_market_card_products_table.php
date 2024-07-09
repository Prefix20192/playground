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
        Schema::table('market_card_products', function (Blueprint $table) {
            $table->json('local_errors')->nullable()->after('errors');
            $table->renameColumn('data_send', 'mp_data');
            $table->renameColumn('errors', 'mp_errors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('market_card_products', function (Blueprint $table) {
            $table->renameColumn('mp_data', 'data_send');
            $table->renameColumn('mp_errors', 'errors');
            $table->dropColumn(['local_errors']);
        });
    }
};
