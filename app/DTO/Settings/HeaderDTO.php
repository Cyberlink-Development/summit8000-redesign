<?php

namespace App\DTO\Settings;

use App\DTO\Common\LinkDTO;
use App\Enums\LinkType;
use Illuminate\Support\Collection;

class HeaderDTO
{
    public function __construct(
        public readonly array   $links,
        public readonly LinkDTO $cta,
    ) {}

    public static function fromData(Collection $menus): self
    {
        $links = $menus->map(fn($menu) =>
            LinkDTO::make($menu->post_type, '/' . $menu->uri, LinkType::Internal)
        )->toArray();

        return new self(
            links: $links,
            cta: LinkDTO::make('Plan Expedition', '/plan-expedition', LinkType::Internal),
        );
    }

    public function toArray(): array
    {
        return [
            'links' => array_map(fn(LinkDTO $l) => $l->toArray(), $this->links),
            'cta'   => $this->cta->toArray(),
        ];
    }
}