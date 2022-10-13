<?php

declare(strict_types=1);

namespace App\Models\Card\UseCase;

class CreateDTO
{
    public function __construct(
        public string $text,
    ) {
    }
}
