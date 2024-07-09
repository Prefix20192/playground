<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
//    protected $connection = 'pgsql';
//
//    public function up(): void
//    {
//        Schema::connection('pgsql')->table('brands', function (Blueprint $table) {
//            $table->text('description')->nullable();
//            $table->text('description_en')->nullable();
//            $table->string('trademark', 255)->comment('торговая марка');
//            $table->boolean('is_ban')
//                ->default(false)
//                ->comment('во включенном режиме не дает создавать новую номенклатуру, содержащуюся в прайсах внешних поставщиков.');
//            $table->boolean('has_contact')
//                ->default('false')
//                ->comment('помогает фильтровать бренды, с производителями которых можно связаться');
//        });
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->table('brands', function (Blueprint $table) {
//            $table->dropColumn([
//                'description',
//                'description_en',
//                'trademark',
//                'is_ban',
//                'has_contact'
//            ]);
//        });
//    }
};
