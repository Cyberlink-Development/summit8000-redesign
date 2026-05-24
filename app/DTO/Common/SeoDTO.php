<?php

namespace App\DTO\Common;

class SeoDTO
{
    public function __construct(
        public readonly ?string $meta_title,
        public readonly ?string $meta_description,
        public readonly ?string $og_title,
        public readonly ?string $og_description,
        public readonly ?string $og_image,
        public readonly ?string $og_image_alt,
        public readonly ?string $canonical_url,
        public readonly ?string $robots,
        public readonly ?string $schema_type,
        public readonly array $schema_data,
        public readonly ?string $focus_keyword,
        public readonly ?bool $in_sitemap,
        public readonly ?float $sitemap_priority,
        public readonly ?string $change_frequency,
    ) {}

    public static function fromModel($model): ?self
    {
        $seo = $model?->seo;

        if (!$seo) return null;

        return new self(
            $seo->meta_title,
            $seo->meta_description,
            $seo->og_title,
            $seo->og_description,
            $seo->og_image,
            $seo->og_image_alt,
            $seo->canonical_url,
            $seo->robots,
            $seo->schema_type,
            $seo->schema_data ?? [],
            $seo->focus_keyword,
            (bool) $seo->in_sitemap,
            (float) $seo->sitemap_priority,
            $seo->change_frequency,
        );
    }

    public function toArray(): array
    {
        return [
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'og_title' => $this->og_title,
            'og_description' => $this->og_description,
            'og_image' => $this->og_image,
            'og_image_alt' => $this->og_image_alt,
            'canonical_url' => $this->canonical_url,
            'robots' => $this->robots,
            'schema_type' => $this->schema_type,
            'schema_data' => $this->schema_data,
            'focus_keyword' => $this->focus_keyword,
            'in_sitemap' => $this->in_sitemap,
            'sitemap_priority' => $this->sitemap_priority,
            'change_frequency' => $this->change_frequency,
        ];
    }
}