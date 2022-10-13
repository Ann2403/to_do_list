<?php

declare(strict_types=1);

namespace App\Services\Transformer;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransformDataResponseToArray
{
    /**
     * @param string $attribute
     * @param ResourceCollection $data
     * @return array<string, ResourceCollection>
     */
    public function resourceCollection(string $attribute, ResourceCollection $data): array
    {
        return [
            $attribute => $data
        ];
    }

    /**
     * @param string $message
     * @return string[]
     */
    public function exception(string $message): array
    {
        return [
            'message' => $message,
        ];
    }

    /**
     * @param array $message
     * @return array[]
     */
    public function invalid(array $message): array
    {
        return [
            'message' => $message,
        ];
    }
}
