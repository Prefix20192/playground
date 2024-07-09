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
        Schema::table('history_marketplace_activities', function (Blueprint $table) {
            $table->boolean('verified')
                ->default(false)
                ->comment('получен ли окончательный статус(успешно\с ошибкой) по заданию');

            $table->integer('status')->nullable()->comment('текущий статус задания');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('history_marketplace_activities', function (Blueprint $table) {
            $table->dropColumn(['verified', 'status']);
        });
    }
};
