<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nomenclatures', function (Blueprint $table) {
            $table->index('brand_name', 'nomenclatures_brand_name_index');
            $table->index('nom_name', 'nomenclatures_nom_name_index');
            $table->index('article', 'nomenclatures_article_index');
        });
    }

    public function down(): void
    {
        Schema::table('nomenclatures', function (Blueprint $table) {
            $table->dropIndex(['brand_name']);
            $table->dropIndex(['nom_name']);
            $table->dropIndex(['article']);
        });
    }
};
