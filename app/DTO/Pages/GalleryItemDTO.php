<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GalleryItemDTO
{
    public function __construct(
        public readonly ?string $slug,
        public readonly ?string $caption,
        public readonly ?string $label,
        public readonly ?array $thumbnail,
    ) {}

    public static function fromModel(
        $galleryItem,
    ): self {
        return new self(

            slug: slug_formatter($galleryItem->title ?? $galleryItem->id),
            label : $galleryItem->title ?? null,
            caption : $galleryItem->title ?? null,
            thumbnail : [
                'url' => $galleryItem->thumbnail
                    ? asset('/uploads/original/' . $galleryItem->thumbnail)
                    : asset('theme-assets/assets/trip/8000.jpg'),

                'alt' => $galleryItem->title ?? null,
            ],
        );
    }

    public function toArray(): array
    {
        return [
            'slug' => $this->slug,
            'caption' => $this->caption,
            'label' => $this->label,
            'thumbnail' => $this->thumbnail,
        ];
    }

    public static function collect(array $items): array
    {
        return array_map(fn($item) => self::fromModel($item)->toArray(), $items);
    }
}
