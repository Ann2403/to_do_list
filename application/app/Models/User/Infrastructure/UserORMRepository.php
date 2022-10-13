<?php

declare(strict_types=1);

namespace App\Models\User\Infrastructure;

use App\Models\User\Entity\Email;
use App\Models\User\Entity\User;

class UserORMRepository implements UserRepository
{
    public function hasByEmail(Email $email): bool
    {
        return User::query()->where('email', $email->getValue())->exists();
    }

    public function byEmail(Email $email): User
    {
        /** @var User $user */
        $user = User::query()->where('email', $email->getValue())->first();
        return $user;
    }
}
