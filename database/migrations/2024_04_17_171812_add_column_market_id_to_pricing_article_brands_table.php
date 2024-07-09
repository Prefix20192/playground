<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pricing_article_brands', function (Blueprint $table) {
            $table->unsignedBigInteger('market_id')->nullable()->after('id')    ;
        });
    }

    public function down(): void
    {
        Schema::table('pricing_article_brands', function (Blueprint $table) {
            $table->dropColumn(['market_id']);
        });
    }
};
