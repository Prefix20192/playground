<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ozon_info_products', function (Blueprint $table) {
            $table->string('type_id')->nullable()->comment('тип категории')->after('description_category_id');
            $table->float('price')->nullable()->comment('цена на товар')->after('offer_id');
            $table->float('old_price')->nullable()->comment('зачеркнутая цена')->after('price');
            $table->json('barcodes')->nullable()->comment('массив с штрихкодами')->after('barcode');
            $table->string('vat')->default('0.0')->comment('ндс')->after('old_price');
        });
    }

    public function down(): void
    {
        if(Schema::hasTable('ozon_info_products')){
            Schema::table('ozon_info_products', function (Blueprint $table) {
                $table->dropColumn(['type_id', 'price', 'old_price', 'barcodes', 'vat']);
            });
        }
    }
};
