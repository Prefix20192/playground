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
        Schema::connection('mysql')->table('market_card_products', function (Blueprint $table) {
            $table->string('offer_id')->index()->nullable()->after('unique_key')
                ->comment('Поле для определения артикула продавца на площадке');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->table('market_card_products', function (Blueprint $table) {
            $table->dropIndex(['offer_id']);
            $table->dropColumn('offer_id');
        });
    }
};
