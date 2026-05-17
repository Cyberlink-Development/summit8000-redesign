<?php

namespace App\DTO\Common;

class SeoDTO
{
    public static function fromModel($model): ?array
    {
        $seo = $model?->seo;

        if (!$seo) return null;

        return [
            'meta_title' => $seo->meta_title,
            'meta_description' => $seo->meta_description,
            'og_title' => $seo->og_title,
            'og_description' => $seo->og_description,
            'og_image' => $seo->og_image,
            'og_image_alt' => $seo->og_image_alt,
            'canonical_url' => $seo->canonical_url,
            'robots' => $seo->robots,
            'schema_type' => $seo->schema_type,
            'schema_data' => $seo->schema_data ?? [],
            'focus_keyword' => $seo->focus_keyword,
            'in_sitemap' => (bool) $seo->in_sitemap,
            'sitemap_priority' => (float) $seo->sitemap_priority,
            'change_frequency' => $seo->change_frequency,
        ];
    }
}
