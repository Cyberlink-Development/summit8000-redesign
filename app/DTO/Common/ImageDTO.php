<?php

namespace App\DTO\Common;

class ImageDTO
{
    public function __construct(
        public readonly ?string $url,
        public readonly ?string $alt,
    ) {}

    public static function make(?string $url, ?string $alt): self
    {
        return new self($url, $alt);
    }

    public function toArray(): array
    {
        return [
            'url'  => $this->url ?? '',
            'alt'  => $this->alt ?? '',
        ];
    }
}