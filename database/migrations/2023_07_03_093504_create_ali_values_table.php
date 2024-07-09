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
        Schema::create('ali_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ali_property_id');
            $table->json('values');
            $table->json('error');
            $table->timestamps();
            $table->foreign('ali_property_id')->references('id')->on('ali_properties')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ali_values');
    }
};
