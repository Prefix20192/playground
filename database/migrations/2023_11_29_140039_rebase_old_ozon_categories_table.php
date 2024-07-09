<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('ozon_old_categories')) {
            Schema::dropIfExists('ozon_old_categories');
            $this->createTable();
        }
        else {
            $this->createTable();
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('old_ozon_categories');
    }

    private function createTable(): void
    {
        Schema::create('old_ozon_categories', function (Blueprint $t) {
            $t->id();
            $t->string('name', 150);
            $t->unsignedBigInteger('parent_id')->nullable();
            $t->bigInteger('source_id');
            $t->timestamps();
        });
    }
};
