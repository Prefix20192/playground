<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $table->float('volume_weight', 10, 3)->nullable()->after('volume');
        });
    }

    public function down(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $table->dropColumn(['volume_weight']);
        });
    }
};
