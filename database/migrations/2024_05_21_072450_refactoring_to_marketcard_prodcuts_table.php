<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('market_card_products', function (Blueprint $table) {
            $table->bigInteger('portal_nomenclature_id')->default(0)
                ->after('category_id')
                ->index('nomenclature')
                ->comment('id номенклатуры портала.');
            $table->index('unique_key', 'unique_key');
        });
    }

    public function down(): void
    {
        Schema::table('market_card_products', function (Blueprint $table) {
            $table->dropIndex('unique_key');
            $table->dropIndex('nomenclature');
            $table->dropColumn(['portal_nomenclature_id']);
        });
    }
};
