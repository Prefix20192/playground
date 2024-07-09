<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $table->integer('size_length')->change();
            $table->integer('size_height')->change();
            $table->integer('size_width')->change();
            $table->integer('net_weight')->change();
        });
    }

    public function down(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $table->float('size_length', 8,3)->nullable()->change();
            $table->float('size_height', 8,3)->nullable()->change();
            $table->float('size_width', 8,3)->nullable()->change();
            $table->float('net_weight', 8,3)->nullable()->change();
        });
    }
};
