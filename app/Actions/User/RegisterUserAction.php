<?php

namespace App\Actions\User;

use App\DTO\User\RegisterDTO;
use App\Jobs\Api\User\SendRegistrationEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class RegisterUserAction
{
    public function __invoke(RegisterDTO $registerUserDTO): string
    {
        $user = User::create([
            'name' => $registerUserDTO->name,
            'email' => $registerUserDTO->email,
            'password' => Hash::make($registerUserDTO->password),
            'surname' => $registerUserDTO->surname
        ]);
        SendRegistrationEmail::dispatch($user);
        return $user->createToken($registerUserDTO->name)->plainTextToken;
    }
}
