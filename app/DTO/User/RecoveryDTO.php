<?php

namespace App\DTO\User;

use Spatie\DataTransferObject\DataTransferObject;

class RecoveryDTO extends DataTransferObject
{
    public readonly string $email;
}
