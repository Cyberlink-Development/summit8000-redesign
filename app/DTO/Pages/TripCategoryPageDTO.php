<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TripCategoryPageDTO
{
    public function __construct(
        public readonly ?string $template,
        public readonly ?string $slug,
        public readonly ?string $href,
        public readonly ?array $hero,
        public readonly ?array $items,
        public readonly ?SeoDTO $seo,
        public readonly ?LengthAwarePaginator $tripCategories,
    ) {}

    public static function fromModel(
        $tripActivity,
        LengthAwarePaginator $tripCategories,
    ): self {
        return new self(
            template: $tripActivity->template,

            slug: slug_formatter($tripActivity->path),
            href: $tripActivity->path,

            hero: [
                'title' => $tripActivity->title ?? null,
                'caption' => $tripActivity->sub_title ?? null,
                'description' => $tripActivity->content ?? null,
                'banner' => [
                    'url' => $tripActivity->banner
                        ? asset('uploads/original/' . $tripActivity->banner)
                        : asset('theme-assets/assets/trip/8000.jpg'),

                    'alt' => $tripActivity->banner_alt ?? ($tripActivity->title ?? null),
                ],
                "breadcrumb" => [
                    "previous"=> [
                        "label"=> "Home",
                        "href"=> "/",
                        "type"=> "internal"
                    ],
                    "current"=> [
                        "label"=> $tripActivity->title ?? null
                    ]
                ]
            ],

            items: TripCategoryItemDTO::collect($tripCategories->items()),

            seo: SeoDTO::fromModel($tripActivity),

            tripCategories: $tripCategories,
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
