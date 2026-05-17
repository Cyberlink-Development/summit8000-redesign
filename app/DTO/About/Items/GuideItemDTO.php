<?php

namespace App\DTO\About\Items;

use App\DTO\Common\ImageDTO;

class GuideItemDTO
{
    public function __construct(
        public readonly string   $slug,
        public readonly string   $avatar,
        public readonly ImageDTO $thumbnail,
    ) {}

    public static function fromArray(array $item): self
    {
        return new self(
            slug:      $item['slug']   ?? '',
            avatar:    $item['avatar'] ?? '',
            thumbnail: ImageDTO::make(
                $item['thumbnail']['url'] ?? '',
                $item['thumbnail']['alt'] ?? '',
            ),
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
            'avatar'    => $this->avatar,
            'thumbnail' => $this->thumbnail->toArray(),
        ];
    }
}