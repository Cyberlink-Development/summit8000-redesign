<?php

namespace App\Http\Resources;

use App\DTO\Pages\TripDetailPageDTO;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class TripDetailResource extends JsonResource
{
    public function __construct(
        public TripModel   $trip,
        public Collection  $relatedTrips,
    ) {
        parent::__construct($trip);
    }

    public function toArray(Request $request): array
    {
        return TripDetailPageDTO::fromModel(
            trip:         $this->trip,
            relatedTrips: $this->relatedTrips,
        )->toArray();
    }
}