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
            $table->text('description')->comment('описание');
            $table->string('type')->comment('тип поля');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wildberries_items_characteristics', function (Blueprint $table) {
            $table->dropColumn(['description', 'type']);
        });
    }
};
