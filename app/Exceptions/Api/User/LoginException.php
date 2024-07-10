<?php

namespace App\Exceptions\Api\User;

use Exception;
use Throwable;

class LoginException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getPredefinedCode(): int
    {
        return $this->code;
    }

    public function getPredefinedMessage(): string
    {
        return $this->message;
    }
}
