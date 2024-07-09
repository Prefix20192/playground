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
        Schema::create('ozon_seller_implementation_body_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('implementation_header_report_id');

            $table->integer('row_number');
            $table->bigInteger('product_id');
            $table->string('product_name');
            $table->string('offer_id');
            $table->string('barcode');
            $table->float('price', 8, 2);
            $table->float('commission_percent', 8, 2);
            $table->float('price_sale', 8, 2);
            $table->integer('sale_qty');
            $table->integer('sale_amount');
            $table->float('sale_discount', 8, 2);
            $table->float('sale_commission',8, 2);
            $table->float('sale_price_seller',8, 2);
            $table->integer('return_sale');
            $table->integer('return_qty');
            $table->integer('return_amount');
            $table->float('return_discount', 8, 2);
            $table->float('return_commission',8, 2);
            $table->float('return_price_seller',8, 2);

            $table->foreign('implementation_header_report_id', 'implementation_header_report_id_foreign')->references('id')->on('ozon_seller_implementation_header_reports');

            $table->unique(['implementation_header_report_id', 'product_id'], 'implementation_header_report_id_product_id_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ozon_seller_implementation_body_reports');
    }
};
