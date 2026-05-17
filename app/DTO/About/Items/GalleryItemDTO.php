<?php

namespace App\DTO\About\Items;

use App\DTO\Common\ImageDTO;

class GalleryItemDTO
{
    public function __construct(
        public readonly ImageDTO $thumbnail,
        public readonly string   $caption,
    ) {}

    public static function fromArray(array $item): self
    {
        return new self(
            thumbnail: ImageDTO::make(
                $item['thumbnail']['url'] ?? '',
                $item['thumbnail']['alt'] ?? '',
            ),
            caption: $item['caption'] ?? '',
        );
    }

    public static function collect(array $items): array
    {
        return array_map(fn($item) => self::fromArray($item)->toArray(), $items);
    }

    public function toArray(): array
    {
        return [
            'thumbnail' => $this->thumbnail->toArray(),
            'caption'   => $this->caption,
        ];
    }
}