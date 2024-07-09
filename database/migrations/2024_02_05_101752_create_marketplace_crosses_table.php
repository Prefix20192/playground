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
        Schema::create('marketplace_crosses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('наименвоание кросса маркетплейса');
            $table->string('slug');
            $table->unsignedBigInteger('marketplace_id')->comment('id площадки');
            $table->unsignedBigInteger('brand_id')->comment('id локального бренда');
            $table->unsignedBigInteger('user_id')->nullable()->comment('id пользователя создавшего или обновившего бренд');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('marketplace_id')
                ->references('id')
                ->on('marketplaces')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketplace_crosses');
    }
};
