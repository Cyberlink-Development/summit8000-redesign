<?php

namespace App\DTO\About\Sections;

use App\DTO\About\Items\TeamMemberDTO;

class TeamSectionDTO
{
    public function __construct(
        public readonly string $slug,
        public readonly string $caption,
        public readonly string $title,
        public readonly string $description,
        public readonly array  $items,
    ) {}

    public static function fromPost($post): self
    {
        return new self(
            slug:        $post->uri          ?? '',
            caption:     $post->caption      ?? '',
            title:       $post->post_title   ?? '',
            description: $post->post_content ?? '',
            items:       TeamMemberDTO::collect($post->meta['items'] ?? []),
        );
    }

    public function toArray(): array
    {
        return [
            'slug'        => $this->slug,
            'caption'     => $this->caption,
            'title'       => $this->title,
            'description' => $this->description,
            'items'       => $this->items,
        ];
    }
}