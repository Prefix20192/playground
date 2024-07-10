<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class RegisterUserDTO extends DataTransferObject
{
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;
    public readonly string $surname;
}
