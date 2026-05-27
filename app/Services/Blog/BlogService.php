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
        // dd($posts);
        return new GlobalCollection(
            resourceData: new BlogListResource(
                postType: $postType,
                posts:    $posts,
            ),
            paginator: $posts,
        );
    }

}
