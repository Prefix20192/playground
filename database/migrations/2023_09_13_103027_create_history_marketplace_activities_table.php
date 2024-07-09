<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('history_marketplace_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marketplace_id')->comment('id маркетплейса');
            $table->unsignedBigInteger('market_card_product_id')->comment('id КТ назначенной на маркет');
            $table->string('activiti', 255)->comment('выполненное дейсвтие');
            $table->bigInteger('task_id')->nullable()->comment('идентификатор задания полученный от маркетплейса');
            $table->json('result')->nullable()->comment('результат полученный от маркетплейса');
            $table->json('error')->nullable()->comment('ошибка полученная от маркетплейса');
            $table->timestamp('created_at')->useCurrent();


            $table->foreign('marketplace_id')->references('id')->on('marketplaces')
                ->cascadeOnDelete();
            $table->foreign('market_card_product_id')->references('id')->on('market_card_products')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_marketplace_activities');
    }
};
