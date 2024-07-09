<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $table->json('diff_price')->after('old_price')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $table->dropColumn(['diff_price']);
        });
    }
};
