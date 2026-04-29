<?php

namespace App\DTO\Header;

class HeaderLinkDTO
{
    public function __construct(
        public string $label,
        public string $href,
        public string $link_type
    ) {}

    public static function make(
        string $label,
        string $href,
        string $type = 'internal'
    ): self {
        return new self($label, $href, $type);
    }

    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'href' => $this->href,
            'link_type' => $this->link_type,
        ];
    }
}
