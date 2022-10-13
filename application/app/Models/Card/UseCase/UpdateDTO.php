<?php

declare(strict_types=1);

namespace App\Models\Card\UseCase;

class UpdateDTO
{
    public function __construct(
        public int $id,
        public ?string $text,
        public ?int $done,
    ) {
    }
}
