<?php

namespace App\Actions\User;

use App\DTO\RegisterUserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class RegisterUserAction
{
    public function __invoke(RegisterUserDTO $registerUserDTO): string
    {
        $user = User::create([
            'name' => $registerUserDTO->name,
            'email' => $registerUserDTO->email,
            'password' => Hash::make($registerUserDTO->password),
            'surname' => $registerUserDTO->surname
        ]);
        return $user->createToken($registerUserDTO->name)->plainTextToken;
    }
}
