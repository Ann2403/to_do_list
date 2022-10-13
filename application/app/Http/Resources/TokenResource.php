<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\User\Entity\Token;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array<string, string>
     */
    public function toArray($request): array
    {
        /**
         * @var Token $token
         */
        $token = $this;

        return [
            'token' => $token->getValue()->plainTextToken,
        ];
    }
}
