<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marketplace_id');
            $table->string('name', 100);
            $table->string('slug')->unique();
            $table->json('credentials')->nullable();
            $table->integer('min_stock_quantity')->default(0);
            $table->boolean('is_active')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->json('contacts')->nullable();
            $table->timestamps();

            $table->foreign('marketplace_id')->references('id')->on('marketplaces')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('markets');
    }
};
