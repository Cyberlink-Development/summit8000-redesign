<?php

namespace App\Http\Resources;

use App\DTO\Pages\AboutPageDTO;
use App\Models\Settings\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class AboutPageResource extends JsonResource
{
    public function __construct(
        public readonly object     $aboutSlug,
        public readonly ?object    $settings,
        public readonly Collection $sections,
    ) {
        parent::__construct($aboutSlug);
    }

    public function toArray(Request $request): array
    {
        return AboutPageDTO::fromModel(
            aboutSlug: $this->aboutSlug,
            settings:  $this->settings,
            sections:  $this->sections,
        )->toArray();
    }
}
