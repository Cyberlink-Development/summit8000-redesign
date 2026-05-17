<?php

namespace App\DTO\About\Items;

use App\DTO\Common\ImageDTO;

class WhyItemDTO
{
    public function __construct(
        public readonly ImageDTO $thumbnail,
        public readonly string   $title,
        public readonly string   $description,
        public readonly array    $bullets,
    ) {}

    public static function fromArray(array $item): self
    {
        return new self(
            thumbnail: ImageDTO::make(
                $item['thumbnail']['url'] ?? '',
                $item['thumbnail']['alt'] ?? '',
            ),
            title:       $item['title']       ?? '',
            description: $item['description'] ?? '',
            bullets:     $item['bullets']     ?? [],
        );
    }

    public static function collect(array $items): array
    {
        return array_map(fn($item) => self::fromArray($item)->toArray(), $items);
    }

    public function toArray(): array
    {
        return [
            'thumbnail'   => $this->thumbnail->toArray(),
            'title'       => $this->title,
            'description' => $this->description,
            'bullets'     => $this->bullets,
        ];
    }
}