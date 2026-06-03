<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BlogListPageDTO
{
    public function __construct(
        public readonly ?string $template,
        public readonly ?string $slug,
        public readonly ?string $href,
        public readonly ?array  $hero,
        public readonly ?array  $featured,
        public readonly ?array  $categories,
        public readonly ?array  $list,
        public readonly ?SeoDTO $seo,
        public readonly ?LengthAwarePaginator $posts,
    ) {}

    public static function fromModel(
        $postType,
        LengthAwarePaginator $posts,
    ): self {
        return new self(
            template:   $postType->template,
            slug:       slug_formatter($postType->path),
            href:       $postType->path,
            hero:       self::buildHero($postType),
            featured:   self::buildFeatured($postType),
            categories: self::buildCategories($postType),
            list:       self::buildLists($postType),
            seo:        SeoDTO::fromModel($postType),
            posts:      $posts,
        );
    }

    private static function buildHero($postType): array
    {
        return [
            'banner' => [
                'url' => $postType->banner
                    ? asset('uploads/original/' . $postType->banner)
                    : asset('theme-assets/assets/trip/8000.jpg'),
                'alt' => $postType->post_type ?? null,
            ],
            'title'   => $postType->post_type ?? 'Our Blog',
            'caption' => $postType->caption   ?? 'Stories, Guides & Expedition Insights',
        ];
    }

    private static function buildFeatured($postType): ?array
    {
        $post = PostModel::where('post_type', $postType->id)->latest()->first();

        if (!$post) {
            return null;
        }

        return [
            'title' => 'Featured Expedition',
            'item'  => [
                'uuid'         => (string) $post->id,
                'title'        => $post->post_title,
                'slug'         => $post->slugs()->first()->slug,
                'category'     => $post->category?->category ?? null,
                'excerpt'      => $post->post_excerpt,
                'published_at' => $post->created_at?->toDateString(),
                'reading_time' => $post->reading_time ?? '5 min read',
                'views'        => $post->visiter ?? 0,
                'thumbnail'    => [
                    'url' => $post->page_thumbnail
                        ? asset('uploads/medium/' . $post->page_thumbnail)
                        : asset('theme-assets/assets/trip/8000.jpg'),
                    'alt' => $post->post_title,
                ],
                'highlight' => [
                    'altitude' => $post->altitude ?? null,
                    'peak'     => $post->peak     ?? null,
                ],
                'cta' => [
                    'label' => 'Read Story',
                    'href'  => $post->slugs()->first()->slug,
                    'type'  => 'internal',
                ],
            ],
        ];
    }

    private static function buildCategories($postType): array
    {
        return PostCategoryModel::where('status', 1)
            ->where('post_type', $postType->id)
            ->orderBy('ordering', 'asc')
            ->get()
            ->map(fn($cat) => [
                'uuid'  => 'cat-' . $cat->id,
                'label' => $cat->category,
                'slug'  => $cat->uri,
            ])
            ->values()
            ->toArray();
    }

    private static function buildLists($postType): ?array
    {
        $posts = PostModel::where('post_type', $postType->id)->get();

        if ($posts->isEmpty()) {
            return [];
        }

        return [
            'title' => $postType->post_type,

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

            'items' => BlogItemDTO::collect($posts->all()),
        ];
    }

    public function toArray(): array
    {
        return [
            'template'   => $this->template,
            'slug'       => $this->slug,
            'href'       => $this->href,
            'hero'       => $this->hero,
            'featured'   => $this->featured,
            'categories' => $this->categories,
            'list'       => $this->list,
            'seo'        => $this->seo?->toArray(),
        ];
    }
}
