<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomizeTripListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->trip_title,
            'slug' => slug_formatter($this->slugs()->first()->slug),
        ];
    }
}