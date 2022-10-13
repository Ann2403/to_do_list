<?php

declare(strict_types=1);

namespace App\Models\Card\Infrastructure;

use App\Models\Card\Entity\Card;
use App\Models\Card\Entity\Id;

interface CardRepository
{
    public function getById(Id $id): Card;
    public function remove(Card $card): void;
}
