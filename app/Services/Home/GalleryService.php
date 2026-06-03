<?php

namespace App\Services\Home;

use App\Models\PageSlug;
use App\Http\Resources\GlobalCollection;
use Illuminate\Http\Request;
use App\Models\Travels\TripGearModel;
use App\Http\Resources\GalleryResource;


class GalleryService
{

    public function handle(PageSlug $pageRoute, Request $request)
    {
        $postType = $pageRoute->sluggable;
        $postType['path'] = $pageRoute->slug;

        $data=TripGearModel::where('thumbnail', '!=', 'NULL')->orderBy('ordering', 'desc')->paginate(
                perPage: (int) $request->query('per_page', 8),
                page:    (int) $request->query('page', 1),
            );
         
        return new GlobalCollection(
            resourceData: new GalleryResource(
                page: $postType,
            ),
            paginator: $data,
        );
    }
}
