<?php

namespace Tests\Feature\User;

use App\Jobs\Api\User\SendRegistrationEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_user(): void
    {

        Queue::fake();
        $user = User::factory()->make()->toArray();
        $user['password'] = Str::password(12, true, true, false);

        $response = $this->postJson(route('register'), $user);

        $response->assertStatus(201)
            ->assertJsonStructure(['token']);

        $this->assertEquals(100, Str::length($response['token']));

        Queue::assertPushed(SendRegistrationEmail::class, function ($job) use ($user) {
            return $job->getUser()->email === $user['email'];
        });
    }
}
