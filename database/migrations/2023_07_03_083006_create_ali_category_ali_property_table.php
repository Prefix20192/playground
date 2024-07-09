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
        Schema::create('ali_category_ali_property', function (Blueprint $table) {
            $table->unsignedBigInteger('ali_category_id');
            $table->unsignedBigInteger('ali_property_id');
            $table->primary(['ali_category_id', 'ali_property_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ali_category_ali_property');
    }
};
