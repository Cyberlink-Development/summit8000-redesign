<?php

namespace App\Services\Blog;

use App\Models\PageSlug;
use App\Http\Resources\GlobalCollection;
use App\Http\Resources\BlogDetailResource;
use Illuminate\Http\Request;

class BlogDetailService
{
    public function handle(PageSlug $pageRoute, Request $request): GlobalCollection
    {
        $blogs = $pageRoute->sluggable->load(['seo']);

        return new GlobalCollection(
            resourceData: new BlogDetailResource(
                blogs: $blogs,
            ),
        );
    }
}
