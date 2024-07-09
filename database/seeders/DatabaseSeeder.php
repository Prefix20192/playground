<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(PortalCategoriesSeeder::class);

        $this->call(MarketplaceSeeder::class);
        $this->call(MarketSeeder::class);

        $this->call(PortalCategoriesSeeder::class);
//        $this->call(LocalAttributeSeeder::class);
        $this->call(AliFieldsSeeder::class);
        $this->call(OzonFieldsSeeder::class);
    }
}
