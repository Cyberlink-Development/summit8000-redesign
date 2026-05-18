<?php

namespace App\DTO\Trip;

class TripListDTO
{
    public function __construct(
        public array $hero = [],
        public array $items = [],
        public array $seo = [],
    ) {}

    public function toArray(): array
    {
        return [
            'hero' => $this->hero,
            'items' => $this->items,
            'seo' => $this->seo,
        ];
    }
}
