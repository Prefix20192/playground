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
        Schema::table('ali_values', function (Blueprint $table) {
            $table->json('error')->nullable()->change();
        });

        Schema::table('ali_sku_values', function (Blueprint $table) {
            $table->json('error')->nullable()->change();
        });
    }
};
