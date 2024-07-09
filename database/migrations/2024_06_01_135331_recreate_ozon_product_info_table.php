<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::connection('mysql')->dropIfExists('ozon_info_products');
    }
};
