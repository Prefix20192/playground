<?php

namespace App\DTO\User;

use Spatie\DataTransferObject\DataTransferObject;

class RegisterDTO extends DataTransferObject
{
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;
    public readonly string $surname;
}
