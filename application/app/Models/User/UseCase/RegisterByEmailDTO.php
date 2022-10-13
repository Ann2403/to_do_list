<?php

declare(strict_types=1);

namespace App\Models\User\UseCase;

class RegisterByEmailDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
