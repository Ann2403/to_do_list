<?php

declare(strict_types=1);

namespace App\Http\Factories;

use Illuminate\Support\Arr;

class ResponseFactory
{
    /**
     * @param string $status
     * @param int $code
     * @param array<string, mixed>|null $data
     * @return array<string, mixed>
     */
    public function dataResponse(string $status, int $code, array $data = null): array
    {
        $array = [
            'responseStatus' => $status,
            'responseCode' => $code,
        ];

        if ($data) {
            $array = Arr::collapse([$array, $data]);
        }

        return $array;
    }
}
