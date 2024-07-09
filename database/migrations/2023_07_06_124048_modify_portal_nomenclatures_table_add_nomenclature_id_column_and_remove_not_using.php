<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portal_nomenclatures', function (Blueprint $table) {
            $table->dropColumn(['description', 'gross_weight', 'multi_sale', 'multi_complect', 'multi_pack', 'nomenclature_timing']);
            $table->unsignedBigInteger('nomenclature_id')->after('id');
            $table->float('price', 10, 2)->nullable()->after('image');
            $table->float('old_price', 10, 2)->nullable()->after('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portal_nomenclatures', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->string('multi_sale')->nullable();
            $table->string('multi_complect')->nullable();
            $table->string('multi_pack')->nullable();
            $table->json('nomenclature_timing')->nullable();
            $table->float('gross_weight', 8, 2)->default(0.000)->nullable()->comment('вес брутто (кг)');
            $table->dropColumn(['nomenclature_id']);
        });
    }
};
