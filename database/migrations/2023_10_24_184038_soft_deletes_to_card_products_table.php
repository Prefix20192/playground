<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('card_products', 'deleted_at'))
        {
            Schema::table('card_products', function (Blueprint $table)
            {
                $table->dropColumn('deleted_at');
            });
        }
        Schema::table('card_products', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('card_products', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
};
