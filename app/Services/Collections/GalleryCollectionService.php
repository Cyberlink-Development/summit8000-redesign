<?php

namespace App\Services\Collections;

use App\DTO\Pages\GalleryItemDTO;
use App\Http\Resources\GlobalCollection;
use App\Models\PageSlug;
use Illuminate\Http\Request;
use App\Models\Travels\TripGearModel;
use App\Http\Resources\GalleryResource;

class GalleryCollectionService
{
    public function handle(PageSlug $pageRoute, Request $request)
    {
        $postType = $pageRoute->sluggable;
        $postType['path'] = $pageRoute->slug;

        $galleryItems = TripGearModel::where('thumbnail', '!=', 'NULL')->orderBy('ordering', 'desc')->paginate(
                perPage: (int) $request->query('per_page', 8),
                page:    (int) $request->query('page', 1),
            );

        return new GlobalCollection(
            resourceData: GalleryItemDTO::collect($galleryItems->items()),
            paginator: $galleryItems,
        );
    }
}