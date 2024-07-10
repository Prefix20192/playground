<?php

namespace App\Actions\User;

use App\DTO\User\LoginDTO;
use App\Exceptions\Api\User\LoginException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class LoginUserAction
{

    public function __invoke(LoginDTO $loginDTO)
    {
        $user = User::where('email', $loginDTO->email)->first();

        if(!$user || !Hash::check($loginDTO->password, $user->password))
        {
            throw new LoginException("Unauthorized", 401);
        }
        return $user->createToken($user->name)->plainTextToken;
    }
}
