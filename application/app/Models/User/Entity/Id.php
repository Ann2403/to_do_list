<?php

declare(strict_types=1);

namespace App\Models\User\Entity;

use App\Exceptions\InvalidRequestException;
use Symfony\Component\Uid\Uuid;

class Id
{
    public function __construct(private string $value)
    {
        $this->value = $this->value ?:
            new InvalidRequestException("Argument ID is must be not empty", 400);
    }

    public static function next(): self
    {
        return new self(Uuid::v4()->toBase32());
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}
