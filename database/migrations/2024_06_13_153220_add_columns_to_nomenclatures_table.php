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
//        Schema::connection('pgsql')->table('nomenclatures', function (Blueprint $table) {
//            $table->smallInteger('status');
//            $table->string('factory_article', 50)->comment('артикул производителя');
//            $table->unsignedBigInteger('user_id')->comment('пользователь создавший или последний внесший изменения');
//        });
//    }
//
//    public function down(): void
//    {
//        Schema::connection('pgsql')->table('nomenclatures', function (Blueprint $table) {
//            $table->dropColumn('status');
//            $table->dropColumn('factory_article');
//            $table->dropColumn('user_id');
//        });
//    }
};
