<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_user(): void
    {
        $user = User::factory()->make()->toArray();
        $user['password'] = Str::password(12, true, true, false);

        $response = $this->postJson(route('register'), $user);

        $response->assertStatus(201)
            ->assertJsonStructure(['token']);

        $this->assertEquals(100, Str::length($response['token']));
    }
}
