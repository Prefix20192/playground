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
        Schema::create('ozon_data_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_value');
            $table->text('info')->nullable();
            $table->text('value');
            $table->string('picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ozon_data_values');
    }
};
