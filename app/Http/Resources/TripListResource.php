<?php

namespace App\Http\Resources;

use App\DTO\Pages\TripListPageDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripListResource extends JsonResource
{
    public function __construct(
        public mixed $tripType,
        public mixed $trips,
    ) {
        parent::__construct($tripType);
    }

    public function toArray(Request $request): array
    {
        return TripListPageDTO::fromModel(
            tripType: $this->tripType,
            trips: $this->trips,
        )->toArray();
    }
}