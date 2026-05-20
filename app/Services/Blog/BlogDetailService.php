<?php

namespace App\Services\Blog;

use App\Models\Posts\PostModel;

class BlogDetailService
{
    public function get($slug): array
    {
        $post = PostModel::with([
            'seo',
            'category',
        ])
            ->where('uri', $slug)
            ->firstOrFail();

        return [
            'data' => [

                'title' => $post->post_title,

                'slug' => $post->uri,

                'category' => $post->category?->category ?? 'Uncategorized',

                'published_at' => optional($post->created_at)->toDateString(),

                'reading_time' => $post->reading_time
                    ? $post->reading_time . ' min read'
                    : '5 min read',

                'views' => (int) ($post->visiter ?? 0),

                'hero' => $this->hero($post),

                'excerpt' => $post->post_excerpt,

                'highlight' => $post->highlight
                    ?? 'The mountain starts testing you before the summit push.',

                'description' => $post->description
                    ?? $post->post_content,

                'author' => $this->author($post),

                'stats' => $this->stats($post),

                'items' => $this->items($post),

                'posts' => $this->posts($post),

                'seo' => $this->seo($post),
            ],

            'meta' => (object) [],
        ];
    }

    private function hero($post): array
    {
        return [
            'banner' => [
                'url' => $post->page_banner
                    ? asset('uploads/original/' . $post->page_banner)
                    : asset('theme-assets/assets/trip/8000.jpg'),

                'alt' => $post->banner_alt
                    ?? $post->post_title,
            ],

            'caption' => $post->caption
                ?? '7,129m · Nepal Himalaya',
        ];
    }

    private function author($post): array
    {
        return [
            'slug' => $post->author_slug
                ?? 'admin',

            'title' => $post->author
                ?? 'Admin',

            'sub_title' => $post->author_designation
                ?? 'Senior Guide',

            'avatar' => strtoupper(
                substr($post->author ?? 'AD', 0, 2)
            ),

            'thumbnail' => [
                'url' => $post->author_thumbnail
                    ? asset('uploads/original/' . $post->author_thumbnail)
                    : asset('theme-assets/assets/user/avatar.jpg'),

                'alt' => $post->author
                    ?? 'Admin',
            ],

            'excerpt' => $post->author_excerpt
                ?? null,

            'achievement' => $post->author_achievement
                ?? null,

            'social' => [
                'caption' => 'Connect',

                'title' => 'Find Author Online',

                'items' => [
                    [
                        'label' => 'instagram',

                        'value' => $post->instagram
                            ?? null,

                        'href' => $post->instagram_link
                            ?? null,

                        'type' => 'external',
                    ],

                    [
                        'label' => 'linkedin',

                        'value' => $post->linkedin
                            ?? null,

                        'href' => $post->linkedin_link
                            ?? null,

                        'type' => 'external',
                    ],

                    [
                        'label' => 'email',

                        'value' => $post->author_email
                            ?? null,

                        'href' => $post->author_email
                            ? 'mailto:' . $post->author_email
                            : null,

                        'type' => 'external',
                    ],
                ],
            ],
        ];
    }

    private function stats($post): array
    {
        return [
            'title' => 'Key expedition information',

            'items' => [
                [
                    'label' => 'Best Season',

                    'value' => $post->best_season
                        ?? 'Apr–May, Sept–Oct',
                ],

                [
                    'label' => 'Difficulty',

                    'value' => $post->difficulty
                        ?? 'Moderate',
                ],

                [
                    'label' => 'Duration',

                    'value' => $post->duration
                        ?? '15–20 days',
                ],

                [
                    'label' => 'Cost Range',

                    'value' => $post->cost_range
                        ?? '$2,000 – $5,000',
                ],
            ],
        ];
    }

    private function items($post)
    {
        return PostModel::with('category')
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get()
            ->map(fn ($item) => [

                'title' => $item->post_title,

                'slug' => $item->uri,

                'category' => $item->category?->category
                    ?? 'Guide',

                'thumbnail' => [
                    'url' => $item->page_thumbnail
                        ? asset('uploads/medium/' . $item->page_thumbnail)
                        : asset('theme-assets/assets/trip/2.jpg'),

                    'alt' => $item->post_title,
                ],
            ])
            ->values();
    }

    private function posts($post)
    {
        return PostModel::with('category')
            ->where('id', '!=', $post->id)
            ->inRandomOrder()
            ->take(3)
            ->get()
            ->map(fn ($item) => [

                'slug' => $item->uri,

                'title' => $item->post_title,

                'category' => $item->category?->category
                    ?? 'Guide',

                'thumbnail' => [
                    'url' => $item->page_thumbnail
                        ? asset('uploads/medium/' . $item->page_thumbnail)
                        : asset('theme-assets/assets/trip/2.jpg'),

                    'alt' => $item->post_title,
                ],
            ])
            ->values();
    }

    private function seo($post): array
    {
        $seo = $post->seo;

        return [
            'meta_title' => $seo?->meta_title
                ?? $post->post_title,

            'meta_description' => $seo?->meta_description
                ?? $post->post_excerpt,

            'og_title' => $seo?->og_title
                ?? $post->post_title,

            'og_description' => $seo?->og_description
                ?? $post->post_excerpt,

            'og_image' => $seo?->og_image
                ? asset('uploads/original/' . $seo->og_image)
                : (
                    $post->page_thumbnail
                        ? asset('uploads/original/' . $post->page_thumbnail)
                        : null
                ),

            'canonical_url' => url('/blog/' . $post->uri),

            'robots' => $seo?->robots
                ?? 'index, follow',

            'robots_txt_extras' => $seo?->robots_txt_extras,

            'schema' => [
                '@context' => 'https://schema.org',

                '@type' => 'BlogPosting',

                'headline' => $post->post_title,

                'description' => $seo?->meta_description
                    ?? $post->post_excerpt,

                'image' => $post->page_thumbnail
                    ? asset('uploads/original/' . $post->page_thumbnail)
                    : null,

                'author' => [
                    '@type' => 'Person',

                    'name' => $post->author
                        ?? 'Admin',
                ],

                'publisher' => [
                    '@type' => 'Organization',

                    'name' => config('app.name'),

                    'logo' => [
                        '@type' => 'ImageObject',

                        'url' => asset('logo.png'),
                    ],
                ],

                'datePublished' => optional($post->created_at)->toDateString(),

                'dateModified' => optional($post->updated_at)->toDateString(),
            ],
        ];
    }
}