<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portal_create_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->unsignedBigInteger('marketplace_order_id')->index()->nullable();
            $table->string('status');
            $table->bigInteger('portal_order_id')->nullable();
            $table->json('data')->comment('Полученные данные по заказу');
            $table->boolean('is_created')->default(false);
            $table->timestamps();

            $table->foreign('market_id')->on('markets')->references('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portal_create_orders');
    }
};
