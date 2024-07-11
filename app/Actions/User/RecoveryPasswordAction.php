<?php

namespace App\Actions\User;

use App\DTO\User\RecoveryDTO;
use App\Exceptions\Api\User\RecoveryException;
use App\Models\PasswordResetToken;
use App\Models\User;
use App\Jobs\Api\User\SendRecoveryPasswordEmail;
use Illuminate\Support\Str;

class RecoveryPasswordAction
{
    public function __invoke(RecoveryDTO $recoveryDTO)
    {
        $user = User::where('email', $recoveryDTO->email)->first();
        if(!$user) {
            throw new RecoveryException("User not found", 404);
        }

        $token = Str::random(60);

        PasswordResetToken::create([
            'user_id' => $user->id,
            'token' => $token,
        ]);

        SendRecoveryPasswordEmail::dispatch($user, $token)->onQueue('default');
    }
}
