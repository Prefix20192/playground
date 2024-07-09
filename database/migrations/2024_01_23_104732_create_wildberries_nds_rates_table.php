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
        Schema::create('wildberries_nds_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('charc_id')->comment('id характеристики');
            $table->string('rate')->comment('ставка НДС');
            $table->timestamps();

            $table->foreign('charc_id')
                ->references('charc_id')
                ->on('wildberries_items_characteristics')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unique(['charc_id', 'rate']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wildberries_nds_rates');
    }
};
