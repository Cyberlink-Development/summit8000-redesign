<?php

namespace App\DTO\Trip;

class TripListDTO
{
    public function __construct(
        public string $template = '',
        public array $hero = [],
        public array $items = [],
        public array $seo = [],
        public array $meta = [],
        public array $links = [],
    ) {}

    public function toArray(): array
    {
        return [
            'template' => $this->template,
            'hero'     => $this->hero,
            'items'    => $this->items,
            'seo'      => $this->seo,
        ];
    }
}
