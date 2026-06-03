<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;
use App\Models\Travels\TripGearModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GalleryPageDTO
{
    public function __construct(
        public readonly ?string $template,
        public readonly ?array $hero,
        public readonly ?array $items,
        public readonly ?SeoDTO $seo,
    ) {}

    public static function fromModel(
        $page,
        LengthAwarePaginator $items
    ): self {

    // dd($page);
        return new self(

            template: $page->template,

            hero: self::hero($page),

            items: GalleryItemDTO::collect($items->items()),

            seo: SeoDTO::fromModel($page),
        );
    }

    protected static function hero($page): array
    {
        return [

            'banner' => [
                'url' => $page?->banner
                    ? asset('uploads/original/' . $page->banner)
                    : asset('images/hero-gallery.jpg'),

                'alt' => $page?->post_type,
            ],

            'caption' => $page?->associated_title,

            'title' => $page?->post_type,

            'description' => $page?->description,

            'breadcrumb' => [

                'previous' => [
                    'label' => 'Home',
                    'href' => '/',
                    'type' => 'internal',
                ],

                'current' => [
                    'label' => $page?->post_type,
                ],
            ],
        ];
    }

    protected static function thumbnail($item): array
    {
        return [

            'url' => $item->thumbnail
                ? asset('uploads/original/' . $item->thumbnail)
                : asset('theme-assets/assets/trip/8000.jpg'),

            'alt' => $item->title ?? $item->name ?? '',
        ];
    }

    public function toArray(): array
    {
        return [

            'template' => $this->template,

            'hero' => $this->hero,

            'items' => $this->items,

            'seo' => $this->seo?->toArray(),
        ];
    }
}

