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
        Schema::create('wildberries_seller_warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('наименование склада');
            $table->bigInteger('id_wb_warehouse')->comment('id WB склада');
            $table->bigInteger('id_seller_warehouse')->comment('id склада продавца');
            $table->integer('cargo_type');
            $table->integer('delivery_type');
            $table->timestamps();

            $table->unique(['name', 'id_seller_warehouse']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wildberries_seller_warehouses');
    }
};
