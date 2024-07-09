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
        Schema::create('hub_files', function (Blueprint $table) {
            $table->id();

            $table->integer('file_id')->comment('id родительской модели');
            $table->string('file_type')->comment('имя класса родительской модели');

            $table->string('file_path')->comment('путь к файлу');
            $table->string('file_storage_path')->nullable()->comment('путь к файлу в storage');

            $table->string('file_name_storage')->nullable()->comment('имя файла в srogare');
            $table->string('file_name_original')->comment('имя файла');

            $table->string('file_extension')->nullable()->comment('расширение файла');

            $table->boolean('is_compressed')->default(false)->comment('true если файл обработан сжатием');
            $table->string('file_storage_compressed_path')->nullable()->comment('путь к сжатому файлу в storage');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hub_files');
    }
};
