<?php

declare(strict_types=1);

namespace App\Models\Card\UseCase;

use App\Models\Card\Entity\Id;
use App\Models\Card\Infrastructure\CardORMRepository;
use Exception;

class UpdateHandler
{
    public function __construct(
        private readonly CardORMRepository $repository,
    ) {
    }

    /**
     * @throws Exception
     */
    public function handler(UpdateDTO $dto): void
    {
        $id = new Id($dto->id);

        $card = $this->repository->getById($id);
        $card->edit($dto->text, $dto->done);
    }
}
