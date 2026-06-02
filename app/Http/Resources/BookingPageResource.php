<?php

namespace App\Http\Resources;

use App\DTO\Booking\BookingPageDTO;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Posts\PostModel;

class BookingPageResource extends JsonResource
{
    public function __construct(
        public TripModel $trip,
    ) {
        parent::__construct($trip);
    }

    public function toArray(Request $request): array
    {
        return BookingPageDTO::fromModel(
            trip: $this->trip,
        )->toArray();
    }
}
