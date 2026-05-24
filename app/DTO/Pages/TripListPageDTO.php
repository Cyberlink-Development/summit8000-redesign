<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TripListPageDTO
{
    public function __construct(
        public readonly ?string $template,
        public readonly ?string $slug,
        public readonly ?string $href,
        public readonly ?array $hero,
        public readonly ?array $items,
        public readonly ?SeoDTO $seo,
        public readonly ?LengthAwarePaginator $trips,
    ) {}

    public static function fromModel(
        $tripType,
        LengthAwarePaginator $trips,
    ): self {
        return new self(
            template: $tripType->template,

            slug: slug_formatter($tripType->path),
            href: $tripType->path,

            hero: [
                'title' => $tripType->title ?? null,
                'caption' => $tripType->sub_title ?? null,
                'description' => $tripType->content ?? null,
                'banner' => [
                    'url' => $tripType->banner
                        ? asset('uploads/original/' . $tripType->banner)
                        : asset('theme-assets/assets/trip/8000.jpg'),

                    'alt' => $tripType->banner_alt ?? ($tripType->title ?? null),
                ],
                "breadcrumb" => [
                    "previous"=> [
                        "label"=> "Home",
                        "href"=> "/",
                        "type"=> "internal"
                    ],
                    "current"=> [
                        "label"=> $tripType->title ?? null
                    ]
                ]
            ],

            items: TripDetailPageDTO::collect($trips->items()),

            seo: SeoDTO::fromModel($tripType),

            trips: $trips,
        );
    }

    public function toArray(): array
    {
        return [
            'template' => $this->template,
            'slug' => $this->slug,
            'href' => $this->href,

            'hero' => $this->hero,
            'items' => $this->items,

            'seo'  => $this->seo?->toArray()
        ];
    }
}