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
        Schema::table('wildberries_items_characteristics', function (Blueprint $table) {
            $table->unique(['charc_id', 'subject_id']);
            $table->dropUnique(['charc_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wildberries_items_characteristics', function (Blueprint $table) {
            $table->unique(['charc_id']);
            $table->dropUnique(['charc_id', 'subject_id']);
        });
    }
};
