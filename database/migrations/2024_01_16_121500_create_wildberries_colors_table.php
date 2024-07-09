<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wildberries_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Наименование цвета');
            $table->string('parent_name')->comment('Наименование родительского цвета');
            $table->timestamps();
            $table->unique(['name', 'parent_name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wildberries_colors');
    }
};
