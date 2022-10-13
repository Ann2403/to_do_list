<?php

declare(strict_types=1);

namespace App\Services\WrapFacade;

use App\Models\User\Entity\User;
use Illuminate\Support\Facades\Auth;

class AuthFacade
{
    public function authUser(): User
    {
        /** @var User $user */
        $user = Auth::user();
        return $user;
    }

    public function attempt(array $data): bool
    {
        return Auth::attempt($data);
    }
}
