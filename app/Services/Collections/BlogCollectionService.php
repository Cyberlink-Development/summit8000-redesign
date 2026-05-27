<?php

namespace App\Services\Collections;

use App\Http\Resources\GlobalCollection;
use App\Models\PageSlug;
use App\Models\Posts\PostModel;
use App\DTO\Pages\BlogItemDTO;
use Illuminate\Http\Request;

class BlogCollectionService
{
    public function handle(PageSlug $pageRoute, Request $request)
    {
        $postType = $pageRoute->sluggable;
        // dd($postType);

        $query = PostModel::query()
            ->where('post_type', $postType->id);

        $category = $request->query('category');
        if ($category && $category !== 'all') {
            $query->whereHas('category', fn($q) => $q->where('uri', $category));
        }

        $sort  = $request->query('sort', 'latest');
        $query = match ($sort) {
            'popular'  => $query->orderByDesc('visiter'),
            'beginner' => $query->where('is_beginner_friendly', true)->latest(),
            default    => $query->latest('updated_at'),
        };

        $posts = $query
            ->where('status', '1')
            ->paginate(
                perPage: (int) $request->query('per_page', 8),
                page:    (int) $request->query('page', 1),
            );

        return new GlobalCollection(
            resourceData: BlogItemDTO::collect($posts->items()),
            paginator:    $posts,
        );
    }
}
