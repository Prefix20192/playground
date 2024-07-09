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
        if(!Schema::hasTable('users_work_groups')) {
            Schema::create('users_work_groups', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('work_group_id');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
                $table->foreign('work_group_id')
                    ->references('id')
                    ->on('work_groups')
                    ->onDelete('cascade');
                $table->primary(['user_id', 'work_group_id']);
                $table->unique(['user_id', 'work_group_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_work_groups');
    }
};
