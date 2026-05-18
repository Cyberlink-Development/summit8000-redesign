<?php

namespace App\DTO\Settings;

class FooterLinkGroupDTO
{
    public function __construct(
        public readonly string $slug,
        public readonly string $label,
        public readonly array  $items,
    ) {}

    public function toArray(): array
    {
        return [
            'slug'  => $this->slug,
            'label' => $this->label,
            'items' => $this->items,
        ];
    }
}