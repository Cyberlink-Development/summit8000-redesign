<?php

namespace App\DTO\Common;

class StatsDTO
{
    public function __construct(
        public readonly array $items,
    ) {}

    public static function fromPost($post): self
    {
        $items = collect($post->meta['items'] ?? [])
            ->map(fn($item) => [
                'value' => $item['value'] ?? '',
                'label' => $item['label'] ?? '',
            ])
            ->all();

        return new self(items: $items);
    }

    public function toArray(): array
    {
        return $this->items;
    }
}