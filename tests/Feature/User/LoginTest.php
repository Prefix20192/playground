<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_user(): void
    {
        $password = Str::password(12, true, true, false);
        $user = User::factory()->make()->toArray();
        $user['password'] = $password;

        $request = [
            "email" => $user['email'],
            "password" => $password,
            "password_confirmation" => $password
        ];

        $this->postJson(route('register'), $user);

        $response = $this->postJson(route('login'), $request);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('token', $response->json());
    }
}
