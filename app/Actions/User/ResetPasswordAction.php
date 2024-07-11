<?php

namespace App\Actions\User;

use App\DTO\User\ResetDTO;
use App\Exceptions\Api\User\ResetPasswordException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Jobs\Api\User\SendResetPasswordEmail;
class ResetPasswordAction
{
    public function __invoke(ResetDTO $DTO)
    {
        $user = User::where('email', $DTO->email)->first();
        if(!$user)
        {
            throw new ResetPasswordException("User not found", 404);
        }

        $passwordResetToken = $user->passwordResetTokens()->where('token', $DTO->token)->first();

        if (!$passwordResetToken) {
            throw new ResetPasswordException("Неверный токен", 422);
        }

        $user->password = Hash::make($DTO->password);
        $passwordResetToken->delete();
        $user->save();

        SendResetPasswordEmail::dispatch($user, $DTO->password);
    }
}
