<?php

namespace App\Services\Collections;

use App\Http\Resources\GlobalCollection;
use App\Models\PageSlug;
use App\Models\Team\TeamModel;
use App\DTO\Team\TeamMemberDTO;
use Illuminate\Http\Request;

class TeamListCollectionService
{
    public function handle(PageSlug $pageRoute, Request $request)
    {
        $guides = TeamModel::where('category', 2)
            ->orderBy('ordering', 'asc')
            ->paginate(
                perPage: (int) $request->query('per_page', 8),
                page:    (int) $request->query('page', 1),
            );

        return new GlobalCollection(
            resourceData: TeamMemberDTO::collect($guides->items()),
            paginator: $guides,
        );
    }
}