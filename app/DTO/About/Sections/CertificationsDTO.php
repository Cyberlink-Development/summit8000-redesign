<?php

namespace App\DTO\About\Sections;

use App\DTO\About\Items\CertificationItemDTO;

class CertificationsDTO
{
    public function __construct(
        public readonly array $items,
    ) {}

    public static function fromPost($post): self
    {
        return new self(
            items: CertificationItemDTO::collect($post->meta['items'] ?? []),
        );
    }

    public function toArray(): array
    {
        return $this->items;
    }
}