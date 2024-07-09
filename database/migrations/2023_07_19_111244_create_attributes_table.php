<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 123);
            $table->string('slug', 123)->unique();
            $table->text('description')->nullable();
            $table->json('value')->nullable();
            $table->string('belong')->nullable();
            $table->string('type')->nullable();
            $table->boolean('is_required')->default(false);
            $table->unsignedBigInteger('ali_field_id')->nullable();
            $table->unsignedBigInteger('ozon_field_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')
                ->cascadeOnUpdate();
            $table->foreign('modified_by')->references('id')->on('users')
                ->cascadeOnUpdate();
            $table->foreign('ali_field_id')->references('id')->on('ali_fields')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('ozon_field_id')->references('id')->on('ozon_fields')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
