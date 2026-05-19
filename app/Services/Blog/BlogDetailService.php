<?php

namespace App\Services\Blog;

use App\Models\Posts\PostModel;

class BlogDetailService
{
    public function get($slug)
    {
        $post = PostModel::with([
            'seo',
        ])->where('uri', $slug)->firstOrFail();

        return [
            'data' => [

                'title' => $post->post_title,

                'slug' => $post->uri,

                'category' => $post->category->category ?? 'Uncategorized',

                'published_at' => $post->created_at?->toDateString(),

                'reading_time' => $post->reading_time ?? '5 min read',

                'views' => $post->visiter ?? 0,

                'hero' => $this->hero($post),

                'author' => $post->author ?? 'Admin',

                'description' => $post->description,

                // 'stats' => $this->stats($post),

                'items' => $this->items($post),

                // 'posts' => $this->posts($post),

                'seo' => $this->seo($post),
            ],

            'meta' => (object) [],
        ];
    }

    private function hero($post)
    {
        return [
            'banner' => [
                'url' => $post->page_banner
                    ? asset('uploads/original/' . $post->page_banner)
                    : asset('theme-assets/assets/trip/8000.jpg'),

                'alt' => $post->post_title,
            ],

            'caption' => $post->caption
                ?? '7,129m · Nepal Himalaya',
        ];
    }

private function items($post)
{
    return PostModel::where('id', '!=', $post->id)
        ->latest()
        ->take(3)
        ->get()
        ->map(fn ($item) => [

            'title' => $item->post_title,

            'slug' => $item->uri,

            'category' => $item->category->category ?? 'Uncategorized',

            'thumbnail' => [
                'url' => $item->page_thumbnail
                    ? asset('uploads/medium/' . $item->page_thumbnail)
                    : asset('theme-assets/assets/trip/2.jpg'),

                'alt' => $item->post_title,
            ],
        ]);
}

private function seo($post)
{
    $seo = $post->seo;

    return [
        'meta_title' => $seo?->meta_title,

        'meta_description' => $seo?->meta_description,

        'og_title' => $seo?->og_title,

        'og_description' => $seo?->og_description,

        'og_image' => $seo?->og_image
            ? asset('uploads/original/' . $seo->og_image)
            : null,

        'canonical_url' => url('/blog/' . $post->uri),

        'robots' => $seo?->robots ?? 'index, follow',     

        'robots_txt_extras' => $seo?->robots_txt_extras,

        'schema' => [
            '@context' => 'https://schema.org',

            '@type' => 'BlogPosting',

            'headline' => $post->post_title,

            'description' => $seo?->meta_description,
        ],
    ];
}
}
