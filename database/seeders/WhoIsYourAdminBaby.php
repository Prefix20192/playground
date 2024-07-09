<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhoIsYourAdminBaby extends Seeder
{
    public function run(): void
    {
        DB::table('work_groups')->upsert(
            [
                'name' => 'admin',
                'is_active' => true,
            ],
            ['name'],
            ['name', 'is_active']
        );

        $adminGroupId = DB::table('work_groups')->where('name', 'admin')->first()->id;

        $adminsEmail = [
            'echo.zahar@gmail.com',
            'Dmitry.Gusyatnikov@absel.ru',
            'happy11_11@mail.ru',
            'sergey@abs.it',
        ];

        $adminsData = [];
        foreach($adminsEmail as $adminEmail){
            $adminsData[] = [
                'user_id' => DB::table('users')->where('email', $adminEmail)->first()->id,
                'work_group_id' => $adminGroupId
            ];
        }

        DB::table('users_work_groups')->upsert(
            $adminsData,
            ['user_id', 'work_group_id'],
            ['user_id', 'work_group_id']
        );
    }
}
