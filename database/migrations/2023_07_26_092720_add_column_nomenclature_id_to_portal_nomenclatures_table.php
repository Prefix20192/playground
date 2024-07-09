<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portal_nomenclatures', function (Blueprint $table) {
            $table->unique('nomenclature_id', 'portal_nomenclatures_nomenclature_id_unique');
        });

        if (!Schema::hasColumn('nomenclature_warehouse', 'nomenclature_id')) {
            Schema::table('nomenclature_warehouse', function (Blueprint $table) {
                $table->bigInteger('nomenclature_id')->unsigned();
                $table->foreign('nomenclature_id')->references('nomenclature_id')->on('portal_nomenclatures')->onDelete('cascade');
                $table->primary(['warehouse_id', 'nomenclature_id'], 'warehouse_nomenclature_id_uniq');
            });
        }
    }

    public function down(): void
    {
        Schema::table('portal_nomenclatures', function (Blueprint $table) {
            Schema::table('nomenclature_warehouse', function (Blueprint $table) {
                if (Schema::hasColumn('nomenclature_warehouse','nomenclature_id')){
                    $table->dropForeign(['nomenclature_id']);
                    $table->dropColumn(['nomenclature_id']);
                }
            });
        });
    }
};
