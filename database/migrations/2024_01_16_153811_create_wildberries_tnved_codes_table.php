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
        Schema::create('wildberries_tnved_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id')->comment('id Предмета WB');
            $table->string('tnved')->comment('ТНВЭД код');
            $table->boolean('is_kiz')->comment('Является ли КИЗ');
            $table->timestamps();

            $table->foreign('subject_id')
                ->references('subject_id')
                ->on('wildberries_items')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unique(['subject_id', 'tnved']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wildberries_tnved_codes');
    }
};
