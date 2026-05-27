<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;
use App\Models\Posts\PostModel;

class BlogDetailPageDTO
{
    public function __construct(
        public readonly ?string $template,
        public readonly ?string $title,
        public readonly ?string $slug,
        public readonly ?string $category,
        public readonly ?string $published_at,
        public readonly ?string $reading_time,
        public readonly ?int    $views,
        public readonly array   $hero,
        public readonly ?string $excerpt,
        public readonly ?string $highlight,
        public readonly ?string $description,
        public readonly array   $author,
        public readonly array   $stats,
        public readonly array   $items,
        public readonly array   $posts,
        public readonly ?SeoDTO $seo,
    ) {}

    public static function fromModel(PostModel $blogs): self
    {
        return new self(
            template:     $blogs->template,
            title:        $blogs->post_title,
            slug:         $blogs->slugs()->first()?->slug,
            category:     $blogs->category?->category ?? null,
            published_at: $blogs->created_at?->toDateString(),
            reading_time: $blogs->reading_time ?? '5 min read',
            views:        $blogs->views ?? 0,
            hero:         self::buildHero($blogs),
            excerpt:      $blogs->post_excerpt,
            highlight:    $blogs->highlight ?? null,
            description:  $blogs->post_content,
            author:       self::buildAuthor($blogs),
            stats:        self::buildStats($blogs),
            items:        self::buildItems($blogs),
            posts:        self::buildPosts($blogs),
            seo:          SeoDTO::fromModel($blogs),
        );
    }

    public function toArray(): array
    {
        return [
            'template'     => $this->template,
            'title'        => $this->title,
            'slug'         => $this->slug,
            'category'     => $this->category,
            'published_at' => $this->published_at,
            'reading_time' => $this->reading_time,
            'views'        => $this->views,
            'hero'         => $this->hero,
            'excerpt'      => $this->excerpt,
            'highlight'    => $this->highlight,
            'description'  => $this->description,
            'author'       => $this->author,
            'stats'        => $this->stats,
            'items'        => $this->items,
            'posts'        => $this->posts,
            'seo'          => $this->seo?->toArray(),
        ];
    }

    // ─────────────────────────────────────────────
    // Builders
    // ─────────────────────────────────────────────

    private static function buildHero(PostModel $post): array
    {
        return [
            'banner' => [
                'url' => $post->page_thumbnail
                    ? asset('uploads/medium/' . $post->page_thumbnail)
                    : asset('theme-assets/assets/trip/2.jpg'),
                'alt' => $post->post_title,
            ],
            'caption' => $post->sub_title ?? null,
        ];
    }

    private static function buildAuthor(PostModel $post): array
    {
        $author = $post->authorRelation ?? null;

        $name = $author?->name ?? $post->author ?? null;
        $initials = $name
            ? collect(explode(' ', $name))->map(fn($w) => strtoupper($w[0] ?? ''))->implode('')
            : null;

        return [
            'slug'      => $author?->uri ?? null,
            'title'     => $name,
            'sub_title' => $author?->position ?? null,
            'avatar'    => $initials,
            'thumbnail' => [
                'url' => $author?->thumbnail
                    ? asset('uploads/team/' . $author->thumbnail)
                    : asset('theme-assets/assets/trip/8000.jpg'),
                'alt' => $name,
            ],
            'excerpt'     => $author?->brief ?? null,
            'achievement' => $author?->highlight ?? null,
            'social'      => [
                'caption' => 'Connect',
                'title'   => 'Find ' . $name . ' Online',
                'items'   => [
                    [
                        'label' => 'instagram',
                        'value' => $author?->instagram ?? null,
                        'href'  => $author?->instagram_url ?? null,
                        'type'  => 'external',
                    ],
                    [
                        'label' => 'linkedin',
                        'value' => $author?->linkedin ?? null,
                        'href'  => $author?->linkedin_url ?? null,
                        'type'  => 'external',
                    ],
                    [
                        'label' => 'email',
                        'value' => $author?->email ?? null,
                        'href'  => $author?->email ? 'mailto:' . $author->email : null,
                        'type'  => 'external',
                    ],
                ],
            ],
        ];
    }

    private static function buildStats(PostModel $post): array
    {
        return [
            'title' => 'Key expedition information',
            'items' => $post->trip ? (array) $post->trip : [],
        ];
    }

    private static function buildItems(PostModel $post): array
    {
        return collect($post->relatedPosts ?? [])
            ->map(fn($related) => [
                'title'    => $related->post_title,
                'slug'     => $related->slugs()->first()?->slug,
                'category' => $related->category?->category ?? null,
                'thumbnail' => [
                    'url' => $related->page_thumbnail
                        ? asset('uploads/medium/' . $related->page_thumbnail)
                        : asset('theme-assets/assets/trip/2.jpg'),
                    'alt' => $related->post_title,
                ],
            ])
            ->toArray();
    }

    private static function buildPosts(PostModel $post): array
    {
        return collect($post->latestPosts ?? [])
            ->map(fn($latest) => [
                'slug'     => $latest->slugs()->first()?->slug,
                'title'    => $latest->post_title,
                'category' => $latest->category?->category ?? null,
                'thumbnail' => [
                    'url' => $latest->page_thumbnail
                        ? asset('uploads/medium/' . $latest->page_thumbnail)
                        : asset('theme-assets/assets/trip/2.jpg'),
                    'alt' => $latest->post_title,
                ],
            ])
            ->toArray();
    }
}
