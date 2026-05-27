<?php

namespace App\Services\Team;

use App\Models\Team\TeamModel;
use App\Models\PageSlug;
use App\Http\Resources\GlobalCollection;
use App\Http\Resources\TeamDetailResource;
use Illuminate\Http\Request;

class TeamDetailService
{
    public function handle(PageSlug $pageRoute, Request $request): GlobalCollection
    {
        $member = $pageRoute->sluggable->load(['seo']);

        return new GlobalCollection(
            resourceData: new TeamDetailResource(
                member: $member,
            ),
        );
    }
}