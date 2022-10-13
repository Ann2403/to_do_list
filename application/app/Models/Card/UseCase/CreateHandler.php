<?php

declare(strict_types=1);

namespace App\Models\Card\UseCase;

use App\Models\Card\Entity\Card;
use App\Services\WrapFacade\AuthFacade;
use Exception;

class CreateHandler
{
    public function __construct(
        private readonly AuthFacade $authFacade,
    ) {
    }

    /**
     * @throws Exception
     */
    public function handler(CreateDTO $dto): void
    {
        $user = $this->authFacade->authUser();

        Card::create(
            $user,
            $dto->text
        );
    }
}
