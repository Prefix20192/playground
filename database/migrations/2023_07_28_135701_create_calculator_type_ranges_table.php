<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calculator_type_ranges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calculator_type_id');
            $table->float('range_min');
            $table->float('range_max');
            $table->timestamps();
            $table->foreign('calculator_type_id')->references('id')->on('calculator_types')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calculator_type_ranges');
    }
};
