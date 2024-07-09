<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('ozon_data_values', function (Blueprint $table) {
            $table->unsignedBigInteger('ozon_value_id');
            $table->foreign('ozon_value_id')
                ->references('id')
                ->on('ozon_data_values')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('ozon_data_values');
    }
};
