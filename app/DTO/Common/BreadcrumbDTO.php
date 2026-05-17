<?php

namespace App\DTO\Common;

use App\Enums\LinkType;

class BreadcrumbDTO
{
    public function __construct(
        public readonly ?LinkDTO $previous,
        public readonly string   $currentLabel,
    ) {}

    public static function make(
        string  $currentLabel,
        ?string $previousLabel = null,
        ?string $previousHref  = null,
    ): self {
        return new self(
            previous: $previousLabel
                ? LinkDTO::make($previousLabel, $previousHref ?? '/', LinkType::Internal)
                : null,
            currentLabel: $currentLabel,
        );
    }

    public function toArray(): array
    {
        return [
            'previous' => $this->previous?->toArray(),
            'current'  => ['label' => $this->currentLabel],
        ];
    }
}