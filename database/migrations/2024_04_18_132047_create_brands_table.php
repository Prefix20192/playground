<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //PGSQL
//    protected $connection = 'pgsql';
//
//    public function up(): void
//    {
//        if (!Schema::hasTable('brands')) {
//            Schema::connection('pgsql')->create('brands', function (Blueprint $table) {
//                $table->id();
//                $table->string('name', 255)->unique();
//                $table->string('slug')->nullable();
//                $table->integer('priority')->default(0)->comment('приоритет сортировки');
//                $table->boolean('is_active')->default(false);
//                $table->unsignedBigInteger('user_id')
//                    ->nullable()
//                    ->comment('пользователь создавший или обновивший бренд');
//                $table->timestamps();
//            });
//        }
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->dropIfExists('brands');
//    }
};
