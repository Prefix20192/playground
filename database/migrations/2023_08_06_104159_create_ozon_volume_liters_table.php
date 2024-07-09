<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ozon_volume_liters', function (Blueprint $table) {
            $table->id();
            $table->float('volume_liter_min', 8, 3);
            $table->float('volume_liter_max', 8, 3)->nullable();
            $table->integer('rate_in_rubles');
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->timestamps();
            $table->foreign('modified_by')->references('id')->on('users')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ozon_volume_liters');
    }
};
