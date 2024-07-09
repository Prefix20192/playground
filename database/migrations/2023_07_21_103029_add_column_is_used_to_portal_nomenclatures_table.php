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
        Schema::table('portal_nomenclatures', function (Blueprint $table) {
            $table->boolean('is_used')->default(false)->comment('true если по номенклатуре создана карточка товара');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portal_nomenclatures', function (Blueprint $table) {
            $table->dropColumn(['is_used']);
        });
    }
};
