<?php

namespace App\DTO\Footer;

class FooterLinkDTO
{
    public function __construct(
        public string $label,
        public ?string $href,
        public ?string $type
    ) {}

    public function toArray()
    {
        return [
            'label' => $this->label,
            'href' => $this->href,
            'type' => $this->type,
        ];
    }
}
