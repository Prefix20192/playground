<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wildberries_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('наименование категории WB');
            $table->unsignedBigInteger('wb_category_id')->unique()->comment('id категории WB');
            $table->boolean('is_visible')->default(false)->comment('видимость категории');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wildberries_categories');
    }
};
