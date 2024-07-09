<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pricing_markets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pricing_marketplace_id');
            $table->unsignedBigInteger('market_id');
            $table->float('interest')->default(0.0);
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricing_markets');
    }
};
