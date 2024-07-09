<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ozon_attributes', function (Blueprint $table) {
            $table->integer('max_value_count')
                ->default(0)
                ->after('category_dependent')
                ->comment('Максимальное количество значений для атрибута.');
            $table->bigInteger('category_dependent')->change();
            $table->renameColumn('category_dependent', 'attribute_complex_id');
        });
    }

    public function down(): void
    {
        Schema::table('ozon_attributes', function (Blueprint $table) {
            $table->dropColumn(['max_value_count']);
            $table->boolean('attribute_complex_id')->change();
            $table->renameColumn('attribute_complex_id', 'category_dependent');
        });
    }
};
