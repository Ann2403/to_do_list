<?php

declare(strict_types=1);

namespace App\Models\User\UseCase;

use App\Exceptions\InvalidRequestException;
use App\Models\User\Entity\Email;
use App\Models\User\Entity\User;
use App\Models\User\Infrastructure\UserORMRepository;
use Exception;
use Illuminate\Support\Facades\Hash;

class RegisterByEmailHandler
{
    public function __construct(
        private readonly UserORMRepository $repository,
    ) {
    }

    /**
     * @throws Exception
     */
    public function handler(RegisterByEmailDTO $dto): void
    {
        $email = new Email($dto->email);

        if ($this->repository->hasByEmail($email)) {
            throw new InvalidRequestException('User already exists.', 400);
        }

        User::createByEmail(
            $email,
            Hash::make($dto->password),
        );
    }
}
