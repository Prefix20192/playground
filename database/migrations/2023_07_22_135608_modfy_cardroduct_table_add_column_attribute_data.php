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
        Schema::table('card_products', function (Blueprint $table) {
            $table->json('attribute_data')->nullable()->after('article');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasColumn('card_products', 'attribute_data'))
        {
            Schema::table('card_products', function (Blueprint $table) {
                $table->dropColumn(['attribute_data']);
            });
        }
    }
};
