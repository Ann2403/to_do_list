<?php

declare(strict_types=1);

namespace App\ReadModel\Card;

use App\Models\Card\Entity\Card;
use App\Models\Card\Entity\Id;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\User\Entity\Id as UserId;

class CardQueryBuilderReadeModel implements CardReadeModel
{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = DB::table(Card::NAME_TABLE);
    }

    public function findForUserId(UserId $id): ?Collection
    {
        $result = $this->builder->select(['id', 'text', 'done'])
            ->where('user_id', $id->getValue())
            ->get();

        return $result ?: null;
    }

    public function findById(Id $id): ?CardView
    {
        $result = $this->builder->select(['id', 'text', 'done'])
            ->where('id', $id->getValue())
            ->first();

        return $result ? new CardView(
            $result->id,
            $result->text,
            $result->done,
        ) : null;
    }
}
