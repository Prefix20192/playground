<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('card_products', 'freight_template_id')) {
            Schema::table('card_products', function (Blueprint $table) {
                $table->dropColumn(['freight_template_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $table->string('freight_template_id')->nullable();
        });
    }
};
