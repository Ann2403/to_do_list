<?php

declare(strict_types=1);

namespace App\ReadModel\Card;

use App\Models\Card\Entity\Id;
use Illuminate\Support\Collection;
use App\Models\User\Entity\Id as UserId;

interface CardReadeModel
{
    public function findForUserId(UserId $id): ?Collection;
    public function findById(Id $id): ?CardView;
}
