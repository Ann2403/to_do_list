<?php

declare(strict_types=1);

namespace App\Models\User\Entity;

use App\Exceptions\InvalidRequestException;
use Laravel\Sanctum\NewAccessToken;

class Token
{
    public const NAME_TOKEN = 'list';

    public function __construct(private NewAccessToken $value)
    {
        $this->value = $this->value ?:
            new InvalidRequestException("Argument Token is must be not empty", 400);
    }

    public function getValue(): NewAccessToken
    {
        return $this->value;
    }
}
