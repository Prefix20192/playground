<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('portal_nomenclatures', function (Blueprint $table) {
            DB::statement('ALTER TABLE portal_nomenclatures MODIFY size_length FLOAT(10,3) DEFAULT 0.000 COMMENT "длина (мм)";');
            DB::statement('ALTER TABLE portal_nomenclatures MODIFY size_width FLOAT(10,3) DEFAULT 0.000 COMMENT "ширина (мм)";');
            DB::statement('ALTER TABLE portal_nomenclatures MODIFY size_height FLOAT(10,3) DEFAULT 0.000 COMMENT "высота (мм)";');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portal_nomenclatures', function (Blueprint $table) {
            DB::statement('ALTER TABLE portal_nomenclatures MODIFY size_length FLOAT(9,3) DEFAULT 0.000 COMMENT "длина (мм)";');
            DB::statement('ALTER TABLE portal_nomenclatures MODIFY size_width FLOAT(9,3) DEFAULT 0.000 COMMENT "ширина (мм)";');
            DB::statement('ALTER TABLE portal_nomenclatures MODIFY size_height FLOAT(9,3) DEFAULT 0.000 COMMENT "высота (мм)";');
        });
    }
};
