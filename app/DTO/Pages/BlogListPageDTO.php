<?php

namespace App\DTO\Pages;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BlogListPageDTO
{
    public function __construct(
        public readonly ?string $template,
        public readonly ?string $slug,
        public readonly ?string $href,
        public readonly ?array $hero,
        public readonly ?array $featured,
        public readonly ?array $categories,
        public readonly ?array $controls,
        public readonly ?array $seo,
        public readonly ?LengthAwarePaginator $posts,
    ) {}

    public static function fromModel(
        $postType,
        LengthAwarePaginator $posts,
    ): self {
        return new self(
            template: $postType->template,

            slug: slug_formatter($postType->path),
            href: $postType->path,

            hero: [
                'title' => $postType->post_type ?? null,
                'caption' => $postType->caption ?? null,
                'banner' => [
                    'url' => $postType->banner
                        ? asset('uploads/original/' . $postType->banner)
                        : asset('theme-assets/assets/trip/8000.jpg'),

                    'alt' => $postType->post_type,
                ],
            ],

            featured: [
                "title" => "Featured Expedition",
                'item' => [
                    'title' => $postType->posts()->latest()->first()->post_title ?? null,
                    'slug' => slug_formatter($postType->posts()->latest()->first()->slugs()->first()->slug) ?? null,
                    'category' => '',
                    'excerpt' => $postType->posts()->latest()->first()->post_excerpt ?? null,
                    "published_at" => $postType->posts()->latest()->first()->updated_at ?? $postType->posts()->latest()->first()->created_at,
                    "reading_time" => '',
                    "views" => '',
                    'thumbnail' => [
                        'url' => $postType->posts()->latest()->first()->page_thumbnail
                            ? asset('uploads/original/' . $postType->posts()->latest()->first()->page_thumbnail)
                            : asset('theme-assets/assets/trip/8000.jpg'),

                        'alt' => $postType->posts()->latest()->first()->post_title
                    ],
                    'highlight' => [
                        'altitued' => '',
                        'peak' => '',
                    ],
                    "cta" => [
                        "label"=> "Read Story",
                        "href"=> $postType->posts()->latest()->first()->slugs()->first()->slug,
                        "type"=> "internal"
                    ]
                ]
            ],

            categories: $postType->categories ?? [],
            

            controls: $postType->controls ?? [],

            seo: [
                'meta_title' => $postType->seo['meta_title'] ?? null,
                'meta_description' => $postType->seo['meta_description'] ?? null,
            ],

            posts: $posts,
        );
    }

    public function toArray(): array
    {
        return [
            'template' => $this->template,
            'slug' => $this->slug,
            'href' => $this->href,

            'hero' => $this->hero,

            'featured' => $this->featured,

            'categories' => $this->categories,

            'list' => [
                // 'controls' => $this->controls,

                // 'items' => collect($this->posts->items())->map(fn ($post) => [
                //     'title' => $post->title,
                //     'slug' => $post->slug,
                //     'excerpt' => $post->excerpt,
                //     'thumbnail' => $post->thumbnail,
                //     'published_at' => $post->published_at,
                // ])->values(),
            ],

            'seo' => $this->seo,
        ];
    }
}