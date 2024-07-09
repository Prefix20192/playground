<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portal_orders', function (Blueprint $table) {
            $table->float('price', 10, 2)
                ->after('portal_order_id')->nullable();
            $table->integer('quantity')->default(0);
            $table->unsignedBigInteger('portal_nomenclature_id')->nullable();
            $table->dateTime('create_date')->nullable()->change();
            $table->string('delivery_name')->nullable()->change();
            $table->string('user_name')->nullable()->change();
            $table->boolean('is_archive')->default(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('portal_orders', function (Blueprint $table) {
            if (Schema::hasColumn('portal_orders', 'price')) {
                $table->dropColumn('price');
            }
            if (Schema::hasColumn('portal_orders', 'quantity')) {
                $table->dropColumn('quantity');
            }
            if(Schema::hasColumn('portal_orders', 'portal_nomenclature_id'))
            {
                $table->dropColumn('portal_nomenclature_id');
            }
        });
    }
};
