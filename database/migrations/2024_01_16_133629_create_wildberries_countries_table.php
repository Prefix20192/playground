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
        Schema::create('wildberries_countries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('country_id')
                ->unique()
                ->comment('id Страны WB');
            $table->string('name')->comment('Значение характеристики Страны');
            $table->string('full_name')->comment('Полное название страны');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wildberries_countries');
    }
};
