<?php

namespace App\DTO\About\Sections;

use App\DTO\About\Items\GalleryItemDTO;
use App\DTO\About\Items\GuideItemDTO;

class StoryDTO
{
    public function __construct(
        public readonly string $caption,
        public readonly string $title,
        public readonly string $description,
        public readonly array  $guides,
        public readonly array  $gallery,
    ) {}

    public static function fromPost($post): self
    {
        $guidesData = $post->meta['guides'] ?? [];

        return new self(
            caption:     $post->caption      ?? '',
            title:       $post->post_title   ?? '',
            description: $post->post_content ?? '',
            guides: [
                'title'     => $guidesData['title']     ?? '',
                'sub_title' => $guidesData['sub_title'] ?? '',
                'items'     => GuideItemDTO::collect($guidesData['items'] ?? []),
            ],
            gallery: GalleryItemDTO::collect($post->meta['gallery'] ?? []),
        );
    }

    public function toArray(): array
    {
        return [
            'caption'     => $this->caption,
            'title'       => $this->title,
            'description' => $this->description,
            'guides'      => $this->guides,
            'gallery'     => $this->gallery,
        ];
    }
}