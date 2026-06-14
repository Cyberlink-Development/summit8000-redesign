<?php

namespace App\DTO\Pages;

class SearchPageDTO
{
    public function __construct(
        public readonly string $query,
        public readonly array  $hero,
        public readonly array  $items,
        public readonly array  $seo,
    ) {}

    public static function fromData(string $keyword, array $items): self
    {
        return new self(
            query: $keyword,
            hero:  self::buildHero($keyword),
            items: $items,
            seo:   [],
        );
    }

    public static function buildHero(string $keyword): array
    {
        return [
            'title'       => 'Search Results',
            'description' => $keyword !== ''
                ? "Showing results for \"{$keyword}\""
                : 'Browse all content',
            'breadcrumb'  => [
                'previous' => [
                    'label' => 'Home',
                    'href'  => '/',
                    'type'  => 'internal',
                ],
                'current' => [
                    'label' => 'Search',
                ],
            ],
        ];
    }

    public function toArray(): array
    {
        return [
            'query' => $this->query,
            'hero'  => $this->hero,
            'items' => $this->items,
            'seo'   => $this->seo,
        ];
    }
}