<?php

namespace App\DTO\Footer;

class PostTypeDTO
{
    public function __construct(
        public string $label,
        public string $href,
        public string $link_type
    ) {}

    public static function fromModel($page): self
    {
        return new self(
            label: $page->post_type,
            href: '/' . $page->uri,
            link_type: 'internal'
        );
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
