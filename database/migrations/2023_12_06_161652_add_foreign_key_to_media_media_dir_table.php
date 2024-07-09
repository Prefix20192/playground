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
        if (Schema::hasTable('media_media_dir')) {
            Schema::table('media_media_dir', function (Blueprint $table) {
                if (Schema::hasColumn('media_media_dir', 'media_id')) {
                    $table->foreign('media_id')
                        ->references('id')
                        ->on('media')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
                }

                if (Schema::hasColumn('media_media_dir', 'media_dir_id')) {
                    $table->foreign('media_dir_id')
                        ->references('id')
                        ->on('media_dirs')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('media_media_dir')) {
            Schema::table('media_media_dir', function (Blueprint $table) {
                if (Schema::hasColumn('media_media_dir', 'media_id')) {
                    $table->dropForeign(['media_id']);
                }

                if (Schema::hasColumn('media_media_dir', 'media_dir_id')) {
                    $table->dropForeign(['media_dir_id']);
                }
            });
        }
    }
};
