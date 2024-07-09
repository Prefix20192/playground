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
        Schema::table('calculators', function (Blueprint $table) {
            $table->float('interest', 5, 2)->nullable()->after('is_oversize')
            ->comment('процент расхода на площадку к цене');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calculators', function (Blueprint $table) {
            $table->dropColumn(['interest']);
        });
    }
};
