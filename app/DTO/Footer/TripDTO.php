<?php

namespace App\DTO\Footer;

class TripDTO
{
    public function __construct(
        public string $label,
        public string $href,
        public string $link_type
    ) {}

    public static function fromModel($trip): self
    {
        return new self(
            label: $trip->trip_title,
            href: '/expeditions/' . $trip->uri,
            link_type: 'internal'
        );
    }

    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'href' => $this->href,
            'link_type' => $this->link_type,
        ];
    }
}
