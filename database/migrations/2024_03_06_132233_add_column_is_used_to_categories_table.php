<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('is_used')->default(false)->comment('Используется ли категория в каких либо КТ');
            $table->index('is_used');
        });
    }
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'is_used')) {
                $table->dropColumn('is_used');
            }
        });
    }
};
