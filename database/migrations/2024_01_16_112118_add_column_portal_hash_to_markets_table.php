<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('markets', function (Blueprint $table) {
            $table->string('portal_hash')->nullable()->after('is_active')
                ->comment('Хеш, по которому получаем и создаем заказы через портал.');
        });
    }

    public function down(): void
    {
        if (Schema::hasColumn('markets', 'portal_hash')) {
            Schema::table('markets', function (Blueprint $table) {
                $table->dropColumn('portal_hash');
            });
        }
    }
};
