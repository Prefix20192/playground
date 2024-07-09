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
        Schema::create('crosses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->comment('id локального бренда');
            $table->string('name')->unique()->comment('наименование кросс бренда');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crosses');
    }
};
