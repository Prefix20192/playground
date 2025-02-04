<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::query()->count() === 0) {
            User::factory()->create([
                'name'                 => 'Test user',
                'surname'              => 'Test surname',
                'email'                => 'example@example.com',
                'email_verified_at'    => now(),
                'password'             => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token'       => Str::random(10),
            ]);
        }
        else {
            User::factory(1)->create();
        }
    }
}
