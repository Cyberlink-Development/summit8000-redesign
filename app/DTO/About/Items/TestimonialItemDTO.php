<?php

namespace App\DTO\About\Items;

use App\DTO\Common\ImageDTO;

class TestimonialItemDTO
{
    public function __construct(
        public readonly string   $slug,
        public readonly float    $rating,
        public readonly ImageDTO $thumbnail,
        public readonly string   $comment,
        public readonly string   $tag,
        public readonly string   $name,
        public readonly string   $avatar,
        public readonly string   $achievement,
    ) {}

    public static function fromArray(array $item): self
    {
        return new self(
            slug:        $item['slug']        ?? '',
            rating:      (float) ($item['rating'] ?? 0),
            thumbnail:   ImageDTO::make(
                $item['thumbnail']['url'] ?? '',
                $item['thumbnail']['alt'] ?? '',
            ),
            comment:     $item['comment']     ?? '',
            tag:         $item['tag']         ?? '',
            name:        $item['name']        ?? '',
            avatar:      $item['avatar']      ?? '',
            achievement: $item['achievement'] ?? '',
        );
    }

    public static function collect(array $items): array
    {
        return array_map(fn($item) => self::fromArray($item)->toArray(), $items);
    }

    public function toArray(): array
    {
        return [
            'slug'        => $this->slug,
            'rating'      => $this->rating,
            'thumbnail'   => $this->thumbnail->toArray(),
            'comment'     => $this->comment,
            'tag'         => $this->tag,
            'name'        => $this->name,
            'avatar'      => $this->avatar,
            'achievement' => $this->achievement,
        ];
    }
}