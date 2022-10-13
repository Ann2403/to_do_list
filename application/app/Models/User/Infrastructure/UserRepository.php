<?php

declare(strict_types=1);

namespace App\Models\User\Infrastructure;

use App\Models\User\Entity\Email;
use App\Models\User\Entity\User;

interface UserRepository
{
    public function hasByEmail(Email $email): bool;
    public function byEmail(Email $email): User;
}
