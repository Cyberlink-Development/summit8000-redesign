<?php

namespace App\Services\Blog;

use App\Http\Resources\BlogListResource;
use App\Http\Resources\GlobalCollection;
use App\Models\PageSlug;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;
use Illuminate\Http\Request;

class BlogService
{
    public function handle(PageSlug $pageRoute, Request $request)
    {
        $postType = $pageRoute->sluggable;
        // dd($postType);
        $postType['path'] = $pageRoute->slug;

        $query = PostModel::query()
            ->where('post_type', $postType->id);

        $category = $request->query('category');
        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        $sort  = $request->query('sort', 'latest');
        $query = match ($sort) {
            'popular'  => $query->orderByDesc('views'),
            'beginner' => $query->where('is_beginner_friendly', true)->latest(),
            default    => $query->latest('updated_at'),
        };

        $posts = $query->paginate(
            perPage: (int) $request->query('per_page', 8),
            page:    (int) $request->query('page', 1),
        );

        return new BlogListResource(
            postType: $postType,
            posts:    $posts,
        );
    }

    public function homeItems()
    {
        $data = PostTypeModel::query()->where('id', 33)->first();

        return collect($data->posts()->latest()->take(3)->get())
            ->map(fn($post) => [
                'uuid'         => (string) $post->id,
                'href'         => '/blog/' . $post->uri,
                'title'        => $post->post_title,
                'slug'         => $post->uri,
                'category'     => $post->category?->category ?? null,
                'excerpt'      => $post->post_excerpt,
                'published_at' => $post->created_at?->toDateString(),
                'reading_time' => $post->reading_time ?? '5 min read',
                'thumbnail'    => [
                    'url' => $post->page_thumbnail
                        ? asset('uploads/medium/' . $post->page_thumbnail)
                        : asset('theme-assets/assets/trip/2.jpg'),
                    'alt' => $post->post_title,
                ],
            ]);
    }
}
