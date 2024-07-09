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
        if (!Schema::hasTable('media_dirs')) {
            Schema::create('media_dirs', function (Blueprint $table) {
                $table->id();
                $table->string('name', 250)->comment('наименование каталога');
                $table->text('description')->nullable()->comment('описание к каталогу');
                $table->string('slug');
                $table->unsignedBigInteger('parent_id')->nullable()->comment('родительский каталог');
                $table->integer('count')->default(0)->comment('количество объектов в директории');
                $table->timestamps();
                $table->softDeletes();
                $table->unique(['slug', 'parent_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_dirs');
    }
};
