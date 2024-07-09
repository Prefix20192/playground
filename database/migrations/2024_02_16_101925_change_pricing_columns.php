<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pricing_categories', function (Blueprint $table) {
            if (Schema::hasColumn('pricing_categories', 'last_modified_by')) {
                $table->renameColumn('last_modified_by', 'modified_by');
            }
        });

        if (Schema::hasColumn('pricing_brands', 'last_modified_by')) {
            Schema::table('pricing_brands', function (Blueprint $table) {
                $table->renameColumn('last_modified_by', 'modified_by');
            });
        }

        if (Schema::hasColumn('pricing_brands', 'category_pricing_id')) {
            Schema::table('pricing_brands', function (Blueprint $table) {
                $table->renameColumn('category_pricing_id', 'pricing_category_id');
            });
        }

        if (Schema::hasColumn('pricing_article_brands', 'last_modified_by')) {
            Schema::table('pricing_article_brands', function (Blueprint $table) {
                $table->renameColumn('last_modified_by', 'modified_by');
            });
        }
    }
};
