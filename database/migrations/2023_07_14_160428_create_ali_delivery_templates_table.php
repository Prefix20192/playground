<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ali_delivery_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->bigInteger('template_id');
            $table->string('template_name');
            $table->bigInteger('products');
            $table->timestamps();
            $table->foreign('market_id')->references('id')->on('markets')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ali_delivery_templates');
    }
};
