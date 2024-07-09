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
        Schema::table('nomenclatures', function (Blueprint $table) {
            //$table->string('nom_name', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nomenclatures', function (Blueprint $table) {
            //$table->string('nom_name', 700)->nullable()->change();
        });
    }
};
