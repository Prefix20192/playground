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
        Schema::create('ozon_seller_implementation_header_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');

            $table->date('doc_date');
            $table->string('num');
            $table->date('start_date');
            $table->date('stop_date');
            $table->date('contract_date');
            $table->string('contract_num');
            $table->string('payer_name');
            $table->string('payer_inn');
            $table->string('payer_kpp');
            $table->string('rcv_name');
            $table->string('rcv_inn');
            $table->string('rcv_kpp');
            $table->float('doc_amount', 8, 2);
            $table->float('vat_amount', 10, 4);
            $table->string('currency_code');

            $table->foreign('market_id')->references('id')->on('markets');
            $table->unique(['doc_date', 'num']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ozon_seller_implementation_header_reports');
    }
};
