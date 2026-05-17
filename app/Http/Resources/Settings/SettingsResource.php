<?php

namespace App\Http\Resources\Settings;

use App\DTO\Settings\SettingsDTO;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'data' => SettingsDTO::fromData($this->resource)->toArray(),
            'meta' => [],
        ];
    }
}