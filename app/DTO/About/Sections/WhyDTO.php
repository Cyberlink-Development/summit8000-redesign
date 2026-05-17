<?php

namespace App\DTO\About\Sections;

use App\DTO\About\Items\WhyItemDTO;

class WhyDTO
{
    public function __construct(
        public readonly string $caption,
        public readonly string $title,
        public readonly string $description,
        public readonly array  $items,
    ) {}

    public static function fromPost($post): self
    {
        return new self(
            caption:     $post->caption      ?? '',
            title:       $post->post_title   ?? '',
            description: $post->post_content ?? '',
            items:       WhyItemDTO::collect($post->meta['items'] ?? []),
        );
    }

    public function toArray(): array
    {
        return [
            'caption'     => $this->caption,
            'title'       => $this->title,
            'description' => $this->description,
            'items'       => $this->items,
        ];
    }
}