<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('ozon_attributes', 'ozon_category_id')) {
            $key = 'ozon_attributes_ozon_category_id_foreign';
            if (Schema::hasColumn('ozon_attributes', $key)) {
                Schema::table('ozon_attributes', function (Blueprint $table) use ($key) {
                    $table->dropForeign($key);
                });
            }
        }
    }
};


