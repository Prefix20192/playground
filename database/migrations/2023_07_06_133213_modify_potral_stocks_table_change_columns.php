<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portal_stocks', function (Blueprint $table) {
            $table->dropColumn([
                'article', 'brand_name', 'nom_name', 'price', 'old_price', 'unique_key'
            ]);

            $table->unsignedBigInteger('nomenclature_id')->after('warehouse_id');
        });
    }

    public function down(): void
    {
        Schema::table('portal_stocks', function (Blueprint $table) {
            $table->string('article');
            $table->string('brand_name');
            $table->string('unique_key');
            $table->string('nom_name')->nullable()->comment('наименование номенклатуры');
            $table->float('price')->nullable()->comment('цена со скидкой');
            $table->float('old_price')->nullable()->comment('цена без скидки');

            $table->dropColumn(['nomenclature_id']);
        });
    }
};
