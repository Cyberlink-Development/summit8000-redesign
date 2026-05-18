<?php

namespace App\DTO\Trip;

class TripDetailDTO
{
    public function __construct(
        public array $hero           = [],
        public array $breadcrumb     = [],
        public array $title          = [],
        public array $nav_items      = [],
        public array $related_blogs  = [],
        public array $booking_widget = [],
        public array $seo            = [],
    ) {}

    public function toArray(): array
    {
        return [
            'hero'           => $this->hero,
            'breadcrumb'     => $this->breadcrumb,
            'title'          => $this->title,
            'nav_items'      => $this->nav_items,
            'related_blogs'  => $this->related_blogs,
            'booking_widget' => $this->booking_widget,
            'seo'            => $this->seo,
        ];
    }
}
