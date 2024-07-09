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
        Schema::table('portal_stocks', function (Blueprint $table) {
            //УуууУУУуу
            $table->unsignedBigInteger('portal_warehouse_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portal_stocks', function (Blueprint $table) {
            $table->string('portal_warehouse_id')->change();
        });
    }
};
