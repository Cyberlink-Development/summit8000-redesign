<?php

namespace App\Http\Resources;

use App\DTO\Pages\TeamDetailPageDTO;
use App\Models\Team\TeamModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamDetailResource extends JsonResource
{
    public function __construct(
        public TeamModel $member,
    ) {
        parent::__construct($member);
    }

    public function toArray(Request $request): array
    {
        return TeamDetailPageDTO::fromModel(
            member: $this->member,
        )->toArray();
    }
}