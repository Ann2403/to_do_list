<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\User\Entity\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array<string, string>
     */
    public function toArray($request): array
    {
        /**
         * @var User $user
         */
        $user = $this;

        return [
            'id' => $user->getId()->getValue(),
            'email' => $user->getEmail()->getValue(),
        ];
    }
}
