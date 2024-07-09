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
        Schema::create('market_portal_nomenclature', function (Blueprint $table) {
            $table->unsignedBigInteger('market_id');
            $table->unsignedBigInteger('portal_nomenclature_id');
            $table->integer('status');
            $table->primary(['market_id', 'portal_nomenclature_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_portal_nomenclature');
    }
};
