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
        if (!Schema::hasTable('media_dir_media')) {
            Schema::create('media_dir_media', function (Blueprint $table) {
                $table->unsignedBigInteger('media_dir_id');
                $table->unsignedBigInteger('media_id');
                $table->timestamps();

                $table->primary(['media_dir_id','media_id']);
                $table->foreign('media_dir_id')->references('id')->on('media_dirs');
                $table->foreign('media_id')->references('id')->on('media');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_dir_media');
    }
};
