<?php

declare(strict_types=1);

namespace App\Models\Card\Infrastructure;

use App\Exceptions\EntityNotFoundException;
use App\Models\Card\Entity\Card;
use App\Models\Card\Entity\Id;

class CardORMRepository implements CardRepository
{
    /**
     * @throws EntityNotFoundException
     */
    public function getById(Id $id): Card
    {
        /** @var Card $card*/
        $card = Card::query()->find($id->getValue());
        return $card ?: throw new EntityNotFoundException('Card is not found!');
    }

    public function remove(Card $card): void
    {
        $card->delete();
    }
}
