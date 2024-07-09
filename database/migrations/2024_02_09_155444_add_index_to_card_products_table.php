<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $table->dropIndex('card_products_brand_name_index');
            $table->string('brand_name', 100)->index()->change();
            $table->string('article', 50)->change();
        });
    }

    public function down(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $table->dropIndex('card_products_brand_name_index');
        });
    }
};
