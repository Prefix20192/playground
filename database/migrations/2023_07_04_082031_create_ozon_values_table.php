<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ozon_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_id')->comment('id ozon атрибута.');
            $table->json('value_result')->comment('List values fo select.');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ozon_values');
    }
};
