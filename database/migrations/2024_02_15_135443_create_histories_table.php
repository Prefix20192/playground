<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('type_action')->comment('создание, обновление, удаление')->index();
            $table->unsignedBigInteger('historyable_id')->nullable()->index()->comment('id в изменяемой таблице');
            $table->string('historyable_type', 100)->nullable()->comment('Сущность в которой изменения.');
            $table->string('changed_column')->comment('какая колонка изменяется')->index();
            $table->json('changed_value_from')->nullable()->comment('какое значение изменилось');
            $table->json('changed_value_to')->nullable()->comment('на какое изменилось.');
            $table->timestamp('created_at')->index();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
