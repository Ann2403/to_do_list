<?php

declare(strict_types=1);

namespace App\ReadModel\Card;

class CardView
{
    public function __construct(
        public int $id,
        public string $text,
        public int $done,
    ) {
    }
}
