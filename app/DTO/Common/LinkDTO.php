<?php

namespace App\DTO\Common;

use App\Enums\LinkType;

class LinkDTO
{
    public function __construct(
        public readonly string   $label,
        public readonly string   $href,
        public readonly LinkType $type,
    ) {}

    public static function make(string $label, string $href, LinkType $type = LinkType::Internal): self
    {
        return new self($label, $href, $type);
    }

    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'href'  => $this->href,
            'type'  => $this->type->value,
        ];
    }
}