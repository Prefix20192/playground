<?php

namespace Tests\Feature\User;

use App\Jobs\Api\User\SendRecoveryPasswordEmail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class RecoverPasswordTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_recovery_password(): void
    {
        Queue::fake();
        $user = User::factory()->create();

        $this->json('POST', route('recovery.password'), ['email' => $user->email])
            ->assertStatus(200)
            ->assertJson(['message' => 'Запрос на восстановление пароля отправлен!']);

        $passwordResetToken = PasswordResetToken::where('user_id', $user->id)->first();
        $this->assertNotNull($passwordResetToken);

        Queue::assertPushed(SendRecoveryPasswordEmail::class, function ($job) use ($user) {
            return $job->getUser()->id === $user->id;
        });
    }
}
