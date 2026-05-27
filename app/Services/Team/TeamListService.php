<?php

namespace App\Services\Team;

use App\Http\Resources\GlobalCollection;
use App\Http\Resources\TeamListResource;
use App\Models\Team\TeamModel;
use App\Models\Posts\PostTypeModel;
use App\Models\PageSlug;
use Illuminate\Http\Request;

class TeamListService
{
    public function handle(PageSlug $pageRoute, Request $request)
    {
        $teamPostType = $pageRoute->sluggable;
        $teamPostType['path'] = $pageRoute->slug;

        $leadership = TeamModel::where('category', 1)
            ->orderBy('ordering', 'asc')
            ->get();

        $guides = TeamModel::where('category', 2)
            ->orderBy('ordering', 'asc')
            ->paginate(
                perPage: (int) $request->query('per_page', 8),
                page:    (int) $request->query('page', 1),
            );

        return new GlobalCollection(
            resourceData: new TeamListResource(
                page: $teamPostType,
                leadership: $leadership,
                guides: $guides,
            ),
            paginator: $guides,
        );
    }
}