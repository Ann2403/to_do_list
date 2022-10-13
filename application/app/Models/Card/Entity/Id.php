<?php

declare(strict_types=1);

namespace App\Models\Card\Entity;

use App\Exceptions\InvalidRequestException;

class Id
{
    public function __construct(private ?int $value)
    {
        $this->value = $this->value ?:
            new InvalidRequestException("Argument ID is must be not empty", 400);
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
