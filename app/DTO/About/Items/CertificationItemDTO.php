<?php

namespace App\DTO\About\Items;

use App\DTO\Common\ImageDTO;

class CertificationItemDTO
{
    public function __construct(
        public readonly string   $slug,
        public readonly ImageDTO $thumbnail,
        public readonly string   $title,
    ) {}

    public static function fromArray(array $item): self
    {
        return new self(
            slug:      $item['slug']  ?? '',
            thumbnail: ImageDTO::make(
                $item['thumbnail']['url'] ?? '',
                $item['thumbnail']['alt'] ?? '',
            ),
            title: $item['title'] ?? '',
        );
    }

    public static function collect(array $items): array
    {
        return array_map(fn($item) => self::fromArray($item)->toArray(), $items);
    }

    public function toArray(): array
    {
        return [
            'slug'      => $this->slug,
            'thumbnail' => $this->thumbnail->toArray(),
            'title'     => $this->title,
        ];
    }
}