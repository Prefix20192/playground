<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $table->index('brand_name', 'card_products_brand_name_index');
            $table->index('name', 'card_products_name_index');
            $table->index('article', 'card_products_article_index');
        });
    }

    public function down(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $indexes = DB::select("SHOW INDEX FROM card_products");

            foreach ($indexes as $index) {
                if (in_array($index->Key_name, ['card_products_brand_name_index', 'card_products_name_index', 'card_products_article_index'])) {
                    $table->dropIndex($index->Key_name);
                }
            }
        });
    }
};
