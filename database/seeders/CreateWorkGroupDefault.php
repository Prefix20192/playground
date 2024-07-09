<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateWorkGroupDefault extends Seeder
{
    public function run(): void
    {
        DB::connection('mysql')
            ->table('work_groups')
            ->insertOrIgnore([
                [
                    'name' => 'admin',
                    'is_active' => true,
                ],
                [
                    'name' => 'marketplace_department',
                    'is_active' => true,
                ],
                [
                    'name' => 'nomenclature_department',
                    'is_active' => true,
                ]
            ]);
    }
}
