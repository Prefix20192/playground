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
        Schema::table('portal_stocks', function (Blueprint $table) {
           $table->string('unique_key_nomenclature')->comment('бренд + артикул номенклатуры');
            $table->renameColumn('nomenclature_id', 'source_nomenclature_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portal_stocks', function (Blueprint $table) {
            $table->dropColumn(['unique_key_nomenclature']);
            $table->renameColumn('source_nomenclature_id', 'nomenclature_id');
        });
    }
};
