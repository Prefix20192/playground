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
        Schema::create('portal_history_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portal_warehouse_id')->comment('портальный id склада');
            $table->unsignedBigInteger('source_nomenclature_id')->comment('портальный id номенклатуры');
            $table->unsignedBigInteger('product_id')->comment('id определенной номенклатуры на определенном складе');
            $table->integer('quantity')->comment('количество товара на складе');
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portal_history_stocks');
    }
};
