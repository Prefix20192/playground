<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class RegisterUserAction
{
    public function __invoke($data): string
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'surname' =>$data['surname']
        ]);
        return $user->createToken($user->name)->plainTextToken;
    }
}
