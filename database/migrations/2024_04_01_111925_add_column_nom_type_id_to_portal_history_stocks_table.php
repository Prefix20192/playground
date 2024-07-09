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
        Schema::table('portal_history_stocks', function (Blueprint $table) {
            $table->bigInteger('nom_type_id')->nullable()->comment('портальная категория');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portal_history_stocks', function (Blueprint $table) {
            $table->dropColumn('nom_type_id');
        });
    }
};
