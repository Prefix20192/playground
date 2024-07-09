<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasIndex('card_products', 'card_products_article_brand_IDX')) {
            Schema::table('card_products', function (Blueprint $table) {
                $table->dropIndex('card_products_article_brand_IDX');
            });
        }
    }
};
