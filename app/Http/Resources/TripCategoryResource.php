<?php

namespace App\Http\Resources;

use App\DTO\Pages\TripCategoryPageDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripCategoryResource extends JsonResource
{
    public function __construct(
        public mixed $tripActivity,
        public mixed $tripCategories,
    ) {
        parent::__construct($tripActivity);
    }

    public function toArray(Request $request): array
    {
        return TripCategoryPageDTO::fromModel(
            tripActivity: $this->tripActivity,
            tripCategories: $this->tripCategories,
        )->toArray();
    }
}
