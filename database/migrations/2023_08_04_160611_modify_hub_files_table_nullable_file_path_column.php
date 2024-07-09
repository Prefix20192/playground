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
        Schema::table('hub_files', function (Blueprint $table) {
            $table->string('file_path')->nullable()->comment('путь к файлу')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hub_files', function (Blueprint $table) {
            $table->string('file_path')->comment('путь к файлу')->change();
        });
    }
};
