<?php

namespace App\DTO\Footer;

class ContactDTO
{
    public function __construct(
        public string $label,
        public string $href,
        public string $link_type
    ) {}

    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'href' => $this->href,
            'link_type' => $this->link_type,
        ];
    }
}
