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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname', 20)->comment('Фамилия');
            $table->string('patronymic', 20)->nullable()->comment('Отчество');
            $table->string('job_title')->nullable()->comment('Должность');
            $table->string('city')->nullable()->comment('Город');
            $table->string('information')->nullable()->comment('Информация');
            $table->boolean('is_active')->default(false)->comment('Активен - заблокирован');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'surname',
                'patronymic',
                'job_title',
                'city',
                'information',
                'is_active'
            ]);
        });
    }
};
