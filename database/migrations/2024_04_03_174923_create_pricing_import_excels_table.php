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
        Schema::create('pricing_import_excels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->string('file_name');
            $table->json('success')->nullable()->comment('товары успешно обработаны');
            $table->json('error')->nullable()->comment('товары обработанные с ошибкой');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_import_excels');
    }
};
