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
        Schema::table('wildberries_items', function (Blueprint $table) {
            $table->unique(['subject_id', 'parent_id'], 'wildberries_items_subject_id_parent_id_index');
        });
        Schema::table('wildberries_items', function (Blueprint $table) {
            $table->dropIndex('wildberries_items_subject_id_parent_id_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wildberries_items');
    }
};
