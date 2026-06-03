<?php

namespace App\Http\Resources;

use App\DTO\Pages\TermsPageDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class TermsPageResource extends JsonResource
{
    public function __construct(
        public readonly object $termsSlug,
        public readonly Collection $sections,
    ) {
        parent::__construct($termsSlug);
    }

    public function toArray(Request $request): array
    {
        return TermsPageDTO::fromModel(
            termsSlug: $this->termsSlug,
            sections: $this->sections,
        )->toArray();
    }
}
