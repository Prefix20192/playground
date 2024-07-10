<?php

namespace App\DTO\User;

use Spatie\DataTransferObject\DataTransferObject;

class LoginDTO extends DataTransferObject
{
    public readonly string $email;
    public readonly string $password;
}
