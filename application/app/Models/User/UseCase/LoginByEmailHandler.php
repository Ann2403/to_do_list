<?php

declare(strict_types=1);

namespace App\Models\User\UseCase;

use App\Models\User\Entity\Token;
use App\Services\WrapFacade\AuthFacade;
use Exception;

class LoginByEmailHandler
{
    public function __construct(
        private readonly AuthFacade $authFacade,
    ) {
    }

    /**
     * @throws Exception
     */
    public function handler(LoginByEmailDTO $dto): ?Token
    {
        if ($this->authFacade->attempt([
            'email' => $dto->email,
            'password' => $dto->password
        ])) {

            $user = $this->authFacade->authUser();
            $token = $user->createToken(Token::NAME_TOKEN);
            return new Token($token);
        }

        return null;
    }
}
