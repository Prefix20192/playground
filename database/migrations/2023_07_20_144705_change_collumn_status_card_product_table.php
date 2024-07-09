<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('card_products', 'status')) {
            Schema::table('card_products', function (Blueprint $table) {
                $table->dropColumn(['status']);
            });
        }
        Schema::table('card_products', function (Blueprint $table) {
            $table->string('status', 64)->nullable()->after('data');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_products');
    }
};
