<?php

namespace App\DTO\Pages;

class BlogItemDTO
{
    public function __construct(
        public ?string $uuid         = null,
        public ?string $slug         = null,
        public ?string $title        = null,
        public ?string $excerpt      = null,
        public ?string $href         = null,
        public ?string $category     = null,
        public ?string $category_slug = null,
        public ?string $reading_time = null,
        public ?string $published_at = null,
        public ?int    $views        = null,
        public ?array  $thumbnail    = [],
    ) {}

    public static function fromModel($post): self
    {
        return new self(
            uuid:          (string) $post->id,
            slug:          $post->uri ?? null,
            title:         $post->post_title ?? null,
            excerpt:       $post->post_excerpt ?? null,
            href:          '/blog/' . $post->uri,
            category:      $post->category?->category ?? null,
            category_slug: $post->category?->uri ?? null,
            reading_time:  $post->reading_time ?? '5 min read',
            published_at:  $post->created_at?->toDateString(),
            views:         $post->visiter ?? 0,
            thumbnail: [
                'url' => $post->page_thumbnail
                    ? asset('uploads/medium/' . $post->page_thumbnail)
                    : asset('theme-assets/assets/trip/2.jpg'),
                'alt' => $post->post_title ?? '',
            ],
        );
    }

    public function toArray(): array
    {
        return [
            'uuid'          => $this->uuid,
            'slug'          => $this->slug,
            'title'         => $this->title,
            'excerpt'       => $this->excerpt,
            'href'          => $this->href,
            'category'      => $this->category,
            'category_slug' => $this->category_slug,
            'reading_time'  => $this->reading_time,
            'published_at'  => $this->published_at,
            'views'         => $this->views,
            'thumbnail'     => $this->thumbnail,
        ];
    }

    public static function collect(array $items): array
    {
        return array_map(fn($item) => self::fromModel($item)->toArray(), $items);
    }
}
