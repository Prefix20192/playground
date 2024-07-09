<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ozon_current_registered_products', function (Blueprint $table) {
            $table->renameColumn('is_ready', 'is_used');
        });
    }

    public function down(): void
    {
        Schema::table('ozon_current_registered_products', function (Blueprint $table) {
            $table->renameColumn('is_used', 'is_ready');
        });
    }
};
