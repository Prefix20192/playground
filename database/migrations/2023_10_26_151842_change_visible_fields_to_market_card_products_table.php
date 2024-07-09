<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('market_card_products', function (Blueprint $table) {
            $table->float('price')->nullable()->change();
            $table->float('old_price')->nullable()->change();
            $table->integer('main_status')->nullable()->change();
        });
    }
};
