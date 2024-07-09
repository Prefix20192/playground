<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calculator_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calculator_id');
            $table->string('name_expense')->comment('наименование расхода.');
            $table->string('slug')->unique()->comment('уникальное строковое значение');
            $table->string('type_expense')->comment('тип расхода на площадку.');
            $table->float('value_expense')->comment('значение по которому будет расчет.');
            $table->string('condition_type')->nullable()->comment('условие');
            $table->float('condition_min')->nullable()->comment('минимальное значение диапозон');
            $table->float('condition_max')->nullable()->comment('максимальное значение диапозон');
            $table->timestamps();

            $table->foreign('calculator_id')->references('id')->on('calculators')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calculator_types');
    }
};
