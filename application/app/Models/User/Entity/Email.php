<?php

declare(strict_types=1);

namespace App\Models\User\Entity;

use App\Exceptions\InvalidRequestException;

class Email
{
    public function __construct(private string $value)
    {
        $this->value = $this->value ?:
            new InvalidRequestException("Argument Email is must be not empty", 400);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
