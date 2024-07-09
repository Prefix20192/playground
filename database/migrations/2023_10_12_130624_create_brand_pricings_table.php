<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pricing_brands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_pricing_id');
            $table->json('brands');
            $table->float('interest', 5, 2);
            $table->unsignedBigInteger('last_modified_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricing_brands');
    }
};
