<?php

namespace Tests\Feature\User;

use App\Actions\User\ResetPasswordAction;
use App\DTO\User\ResetDTO;
use App\Exceptions\Api\User\ResetPasswordException;
use App\Jobs\Api\User\SendResetPasswordEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_reset_password(): void
    {
        Queue::fake(); // Mock the Queue

        $user = User::factory()->create();
        $oldPassword = $user->password;
        $newPassword = fake()->password;
        $token = fake()->md5;

        $this->createPasswordResetToken($user, $token);
        $resetDTO = [
            'email' => $user->email,
            'token' => $token,
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ];

        $this->executePasswordReset($resetDTO, $user, $oldPassword);
    }

    private function createPasswordResetToken(User $user, string $token): void
    {
        $user->passwordResetTokens()->create(['token' => $token]);
    }

    private function executePasswordReset(array $resetDTO, User $user, string $oldPassword): void
    {
        $action = new ResetPasswordAction();

        try {
            $action(new ResetDTO($resetDTO));
            $user->refresh();

            $this->assertNotEquals($oldPassword, $user->password);
            $this->assertDatabaseMissing('password_reset_tokens', ['token' => $resetDTO['token'], 'user_id' => $user->id]);
            $this->assertResetEmailSent($user);
        } catch (ResetPasswordException $e) {
            $this->fail($e->getMessage());
        }
    }

    private function assertResetEmailSent(User $user): void
    {
        Queue::assertPushed(SendResetPasswordEmail::class, function ($job) use ($user) {
            return $job->getUser()->id === $user->id;
        });
    }
}
