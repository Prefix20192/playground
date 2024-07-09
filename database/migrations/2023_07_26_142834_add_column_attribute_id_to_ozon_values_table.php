<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ozon_values', function (Blueprint $table) {
            $table->unsignedBigInteger('ozon_attribute_id')->after('id');
            $table->unsignedBigInteger('ozon_category_id')->after('id');

        });
    }

    public function down(): void
    {
        Schema::table('ozon_values', function (Blueprint $table) {
            $table->dropColumn(['ozon_attribute_id', 'ozon_category_id']);
        });
    }
};
