<?php

namespace App\DTO\About\Sections;

use App\DTO\Common\ImageDTO;

class FounderDTO
{
    public function __construct(
        public readonly string   $slug,
        public readonly string   $caption,
        public readonly string   $title,
        public readonly string   $subTitle,
        public readonly string   $tag,
        public readonly ImageDTO $thumbnail,
        public readonly array    $badge,
        public readonly string   $description,
        public readonly array    $achievements,
    ) {}

    public static function fromPost($post): self
    {
        return new self(
            slug:         $post->uri                   ?? '',
            caption:      $post->caption               ?? '',
            title:        $post->post_title            ?? '',
            subTitle:     $post->sub_title             ?? '',
            tag:          $post->meta['tag']           ?? '',
            thumbnail:    ImageDTO::make(
                $post->page_thumbnail ?? '',
                $post->post_title     ?? '',
            ),
            badge:        $post->meta['badge']        ?? [],
            description:  $post->post_content         ?? '',
            achievements: $post->meta['achievements'] ?? [],
        );
    }

    public function toArray(): array
    {
        return [
            'slug'         => $this->slug,
            'caption'      => $this->caption,
            'title'        => $this->title,
            'sub_title'    => $this->subTitle,
            'tag'          => $this->tag,
            'thumbnail'    => $this->thumbnail->toArray(),
            'badge'        => $this->badge,
            'description'  => $this->description,
            'achievements' => $this->achievements,
        ];
    }
}