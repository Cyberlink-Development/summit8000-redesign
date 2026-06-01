<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;

class TripItemDTO
{
    public function __construct(
        public ?string $template = null,
        public ?string $slug = null,
        public ?string $tag = null,
        public ?string $title = null,
        public ?string $price = null,
        public ?string $href = null,

        public ?array $attributes = [],
        public ?array $thumbnail = [],
        public ?array $cta = [],

        public ?SeoDTO $seo = null,
    ) {}

    public static function fromModel($trip): self
    {
        // dd($trip);
        return new self(
            template: $trip->template,
            slug: $trip->slug ?? null,
            tag: $trip->tag ?? null,
            title: $trip->trip_title ?? null,
            price: $trip->price ?? null,
            href: $trip->slugs()?->first()?->slug,

            attributes: [
                [
                    'label' => 'duration',
                    'text'  => $trip->duration ?? '',
                ],
                [
                    'label' => 'group',
                    'text'  => $trip->group_size ?? '',
                ],
                [
                    'label' => 'level',
                    'text'  => $trip->level ?? '',
                ],
            ],

            thumbnail: [
                'url' => $trip->thumbnail
                    ? asset('uploads/thumbnails/' . $trip->thumbnail)
                    : asset('images/placeholder-thumbnail.webp'),
                'alt' => $trip->thumbnail_alt ?? $trip->title,
            ],

            cta: [
                'label' => 'Book',
                'href'  => '/book' . $trip->slugs()?->first()?->slug,
                'type'  => 'internal',
            ],

            seo: SeoDTO::fromModel($trip),
        );
    }

    public function toArray(): array
    {
        return [
            'template'    => $this->template,
            'slug'        => $this->slug,
            'tag'         => $this->tag,
            'title'       => $this->title,
            'price'       => $this->price,
            'href'        => $this->href,
            'attributes'  => $this->attributes,
            'thumbnail'   => $this->thumbnail,
            'cta'         => $this->cta,
            'seo'         => $this->seo?->toArray()
        ];
    }

    public static function collect(array $items): array
    {
        return array_map(fn($item) => self::fromModel($item)->toArray(), $items);
    }
}
