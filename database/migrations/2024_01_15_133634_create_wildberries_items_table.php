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
        Schema::create('wildberries_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subject_id')->comment('id предмета');
            $table->unsignedBigInteger('parent_id')->comment('id родительской категории');
            $table->string('subject_name')->comment('наименование предмета');
            $table->string('parent_name')->comment('имя родительской категоррии');
            $table->boolean('is_visible')->comment('видимость предмета');
            $table->timestamps();

            $table->foreign('parent_id')
                ->references('wb_category_id')
                ->on('wildberries_categories')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wildberries_items');
    }
};
