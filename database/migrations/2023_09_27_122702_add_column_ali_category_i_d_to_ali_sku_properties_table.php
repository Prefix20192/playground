<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ali_sku_properties', function (Blueprint $table) {
            $table->unsignedBigInteger('ali_category_id')->nullable()->after('id');
//            $table->foreign('ali_category_id')->references('id')->on('ali_categories');
        });
    }

    public function down(): void
    {
        Schema::table('ali_sku_properties', function (Blueprint $table) {
//            $table->dropForeign(['ali_category_id']);
            $table->dropColumn(['ali_category_id']);
        });
    }
};
