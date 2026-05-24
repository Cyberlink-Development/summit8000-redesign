<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TripCategoryItemDTO
{
    public function __construct(
        public readonly ?string $template,
        public readonly ?string $slug,
        public readonly ?string $href,
        public readonly ?string $title,
        public readonly ?int $count,
        public readonly ?string $elevation,
        public readonly ?string $caption,
        public readonly ?string $description,
        public readonly ?array $thumbnail,
    ) {}

    public static function fromModel(
        $tripType,
    ): self {
        // dd($tripType->slugs()->first()->slug);
        return new self(
            template: $tripType->template,

            slug: slug_formatter($tripType->slugs()->first()->slug),
            href: $tripType->slugs()->first()->slug,

            title : $tripType->title ?? null,
            count : $tripType->trips()->count() ?? 0,
            elevation : $tripType->elevation ?? null,
            caption : $tripType->sub_title ?? null,
            description : $tripType->content ?? null,
            thumbnail : [
                'url' => $tripType->banner
                    ? asset('uploads/original/' . $tripType->banner)
                    : asset('theme-assets/assets/trip/8000.jpg'),

                'alt' => $tripType->banner_alt ?? ($tripType->title ?? null),
            ],
        );
    }

    public function toArray(): array
    {
        return [
            'template' => $this->template,
            'slug' => $this->slug,
            'href' => $this->href,

            'title' => $this->title,
            'count' => $this->count,
            'elevation' => $this->elevation,
            'caption' => $this->caption,
            'description' => $this->description,

            'thumbnail' => $this->thumbnail,
        ];
    }

    public static function collect(array $items): array
    {
        return array_map(fn($item) => self::fromModel($item)->toArray(), $items);
    }
}
