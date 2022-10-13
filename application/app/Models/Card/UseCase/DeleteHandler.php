<?php

declare(strict_types=1);

namespace App\Models\Card\UseCase;

use App\Models\Card\Entity\Id;
use App\Models\Card\Infrastructure\CardORMRepository;
use Exception;

class DeleteHandler
{
    public function __construct(
        private readonly CardORMRepository $repository,
    ) {
    }

    /**
     * @throws Exception
     */
    public function handler(Id $id): void
    {
        $service = $this->repository->getById($id);

        $this->repository->remove($service);
    }
}
