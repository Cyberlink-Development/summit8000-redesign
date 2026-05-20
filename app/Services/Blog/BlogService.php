<?php

namespace App\Services\Blog;

use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;

class BlogService
{
    public function get()
    {
        $data = PostTypeModel::with('seo')
            ->where('id', 33)
            ->first();

        return [
            'data' => [
                'hero' => $this->hero(),
                'featured' => $this->featured($data),
                'categories' => $this->categories($data),
                'list'=> $this->articleListControls(),
                'items' => $this->items($data->posts()->latest()->paginate(10)),
                'seo' => $this->seo($data),

            ],

            // 'meta' => $this->meta($data->posts()),
        ];
    }

    private function hero()
    {
        $blogPage = PostTypeModel::find(33);

        if (!$blogPage) {
            return null;
        }

        return [
            'banner' => [
                'url' => $blogPage->banner
                    ? asset('uploads/original/' . $blogPage->banner)
                    : asset('theme-assets/assets/trip/8000.jpg'),

                'alt' => $blogPage->post_type,
            ],

            'title' => $blogPage->post_type ?? 'Our Blog',

            'caption' => $blogPage->caption
                ?? 'Stories, Guides & Expedition Insights',
        ];
    }

    private function featured($data)
    {
        $post = PostModel::where('post_type', $data->id)->latest()->first();

        if (!$post) {
            return null;
        }

        return [
            'title' => 'Featured Expedition',

            'item' => [
                'uuid' => (string) $post->id,

                'title' => $post->post_title,

                'slug' => $post->uri,

                'category' => $post->category ? $post->category->category : $post->post_title,

                'excerpt' => $post->post_excerpt,

                'published_at' => $post->created_at?->toDateString(),

                'reading_time' => $post->reading_time ?? '5 min read',

                'views' => $post->visiter ?? 0,

                'thumbnail' => [
                    'url' => $post->page_thumbnail ? asset('uploads/medium/' . $post->page_thumbnail) : asset('theme-assets/assets/trip/2.jpg'),
                    'alt' => $post->post_title,
                ],

                'highlight' => [
                    'altitude' => $post->altitude ?? null,
                    'peak' => $post->peak ?? null,
                ],

                'cta' => [
                    'label' => 'Read Story',
                    'href' => '/blog/' . $post->uri,
                    'type' => 'internal',
                ],
            ],

        ];
    }

    private function categories($data)
    {
        return PostCategoryModel::where('status', 1)->where('post_type', $data->id)
            ->orderBy('ordering', 'asc')
            ->get()
            ->map(fn($category) => [
                'uuid' => 'cat-' . $category->id,

                'label' => $category->category,

                'slug' => $category->uri,
            ])
            ->values()
            ->toArray();
    }

    private function items($posts)
    {
        return collect($posts->items())->map(fn($post) => [
            'uuid' => (string) $post->id,

            "href" => $post->uri,

            'title' => $post->post_title,

            'slug' => $post->uri,

            'category' => $post->category ? $post->category->category : $post->post_title,

            'excerpt' => $post->post_excerpt,

            'published_at' => $post->created_at?->toDateString(),

            'reading_time' => $post->reading_time ?? '5 min read',

            'thumbnail' => [
                'url' => $post->page_thumbnail ? asset('uploads/medium/' . $post->page_thumbnail) : asset('theme-assets/assets/trip/2.jpg'),
                'alt' => $post->post_title,
            ],
        ]);
    }

    private function articleListControls(): array
{
    return [
        'title' => 'Latest Articles',

        'controls' => [
            [
                'type' => 'sort',

                'default' => 'latest',

                'options' => [
                    [
                        'slug' => 'latest',
                        'label' => 'Latest',
                    ],

                    [
                        'slug' => 'popular',
                        'label' => 'Popular',
                    ],

                    [
                        'slug' => 'beginner',
                        'label' => 'Beginner',
                    ],
                ],
            ],
        ],
    ];
}

    private function seo($data)
    {
        return [
            'meta_title' => $data->seo->meta_title
                ?? 'Himalayan Blog | Trekking Guides & Expedition Stories',

            'meta_description' => $data->seo->meta_description
                ?? 'Explore Everest trekking guides, travel tips, and Himalayan expedition stories from expert Sherpas.',

            'og_title' => $data->seo->og_title
                ?? 'Himalayan Blog — Summit 8000',

            'og_description' => $data->seo->og_description
                ?? 'Expert trekking insights and expedition stories from Nepal.',

            'og_image' => $data->seo->og_image
                ? asset('uploads/original/' . $data->seo->og_image)
                : asset('theme-assets/assets/trip/8000.jpg'),

            'canonical_url' => url('/blog'),

            'robots' => $data->seo->robots
                ?? 'index, follow',

            'robots_txt_extras' => $data->seo->robots_txt_extras,

            'schema' => [
                '@context' => 'https://schema.org',

                '@type' => 'Blog',

                'name' => $data->post_type ?? 'Summit 8000 Blog',

                'url' => url('/blog'),
            ],
        ];
    }

    // private function meta($posts)
    // {
    //     return [
    //         'current_page' => $posts->currentPage(),

    //         'per_page' => $posts->perPage(),

    //         'total' => $posts->total(),

    //         'last_page' => $posts->lastPage(),

    //         'from' => $posts->firstItem(),

    //         'to' => $posts->lastItem(),

    //         'has_more' => $posts->hasMorePages(),
    //     ];
    // }
}
