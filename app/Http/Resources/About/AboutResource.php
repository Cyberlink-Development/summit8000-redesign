<?php

namespace App\Http\Resources\About;

use App\DTO\About\AboutPageDTO;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "data" => AboutPageDTO::fromData($this->resource)->toArray(),
            'meta' => [],
        ];
    }
}