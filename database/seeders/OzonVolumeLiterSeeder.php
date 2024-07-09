<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OzonVolumeLiterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ozon_volume_liters')->insert($this->volumeLitersArray());
    }

    private function volumeLitersArray(): array
    {
        return [
            [
                'volume_liter_min'  => 0.000,
                'volume_liter_max'  => 0.200,
                'rate_in_rubles'    => 40,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 0.201,
                'volume_liter_max'  => 0.300,
                'rate_in_rubles'    => 41,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 0.301,
                'volume_liter_max'  => 0.400,
                'rate_in_rubles'    => 42,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 0.401,
                'volume_liter_max'  => 0.500,
                'rate_in_rubles'    => 43,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 0.501,
                'volume_liter_max'  => 0.600,
                'rate_in_rubles'    => 43,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 0.601,
                'volume_liter_max'  => 0.700,
                'rate_in_rubles'    => 45,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 0.701,
                'volume_liter_max'  => 0.8,
                'rate_in_rubles'    => 45,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 0.801,
                'volume_liter_max'  => 0.900,
                'rate_in_rubles'    => 47,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 0.901,
                'volume_liter_max'  => 1.000,
                'rate_in_rubles'    => 49,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 1.001,
                'volume_liter_max'  => 1.900,
                'rate_in_rubles'    => 51,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [ //11
                'volume_liter_min'  => 1.901,
                'volume_liter_max'  => 2.900,
                'rate_in_rubles'    => 55,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 2.901,
                'volume_liter_max'  => 4.900,
                'rate_in_rubles'    => 57,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 4.901,
                'volume_liter_max'  => 5.900,
                'rate_in_rubles'    => 61,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 5.901,
                'volume_liter_max'  => 6.900,
                'rate_in_rubles'    => 63,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 6.901,
                'volume_liter_max'  => 7.900,
                'rate_in_rubles'    => 65,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 7.901,
                'volume_liter_max'  => 8.400,
                'rate_in_rubles'    => 67,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 8.401,
                'volume_liter_max'  => 8.900,
                'rate_in_rubles'    => 69,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 8.901,
                'volume_liter_max'  => 9.400,
                'rate_in_rubles'    => 70,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 9.401,
                'volume_liter_max'  => 9.900,
                'rate_in_rubles'    => 71,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 9.901,
                'volume_liter_max'  => 14.900,
                'rate_in_rubles'    => 79,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [ //21
                'volume_liter_min'  => 14.901,
                'volume_liter_max'  => 19.900,
                'rate_in_rubles'    => 100,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 19.901,
                'volume_liter_max'  => 24.900,
                'rate_in_rubles'    => 120,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 24.901,
                'volume_liter_max'  => 29.900,
                'rate_in_rubles'    => 135,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 29.901,
                'volume_liter_max'  => 34.900,
                'rate_in_rubles'    => 160,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 34.901,
                'volume_liter_max'  => 39.900,
                'rate_in_rubles'    => 185,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 39.901,
                'volume_liter_max'  => 44.900,
                'rate_in_rubles'    => 210,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 44.901,
                'volume_liter_max'  => 49.900,
                'rate_in_rubles'    => 225,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 49.901,
                'volume_liter_max'  => 54.900,
                'rate_in_rubles'    => 265,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 54.901,
                'volume_liter_max'  => 59.900,
                'rate_in_rubles'    => 290,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 59.901,
                'volume_liter_max'  => 64.900,
                'rate_in_rubles'    => 315,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [ // 31
                'volume_liter_min'  => 64.901,
                'volume_liter_max'  => 69.900,
                'rate_in_rubles'    => 350,
                'created_at'        => now(),
                'updated_at'        => now(),
            ], [
                'volume_liter_min'  => 69.901,
                'volume_liter_max'  => 74.900,
                'rate_in_rubles'    => 370,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'volume_liter_min'  => 74.901,
                'volume_liter_max'  => 99.900,
                'rate_in_rubles'    => 400,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'volume_liter_min'  => 99.901,
                'volume_liter_max'  => 124.900,
                'rate_in_rubles'    => 525,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'volume_liter_min'  => 124.901,
                'volume_liter_max'  => null,
                'rate_in_rubles'    => 700,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
//            [
//                'volume_liter_min'  => null,
//                'volume_liter_max'  => null,
//                'rate_in_rubles'    => 1100,
//            ],
        ];
    }
}
