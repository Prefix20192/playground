<?php

namespace App\DTO\User;

use Spatie\DataTransferObject\DataTransferObject;
class ResetDTO extends DataTransferObject
{
    public readonly string $email;
    public readonly string $password;
    public readonly string $token;
}
