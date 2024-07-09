<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pricing_article_brands', function (Blueprint $table) {
            $table->id();
            $table->string('unique_key')->unique();
            $table->string('article');
            $table->string('brand_name');
            $table->float('price', 10, 2);
            $table->unsignedBigInteger('last_modified_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricing_article_brands');
    }
};
