<?php

namespace App\DTO\Common;

class SeoDTO
{
    public function __construct(
        public readonly ?string $metaTitle,
        public readonly ?string $metaDescription,
        public readonly ?string $ogTitle,
        public readonly ?string $ogDescription,
        public readonly ?string $ogImage,
        public readonly ?string $ogImageAlt,
        public readonly ?string $canonicalUrl,
        public readonly ?string $robots,
        public readonly ?string $robotsTxtExtras,
        public readonly ?array  $schema,
        public readonly ?string $focusKeyword,
        public readonly bool    $inSitemap,
        public readonly float   $sitemapPriority,
        public readonly ?string $changeFrequency,
        public readonly array   $extraMeta,
        public readonly array   $scriptTags,
    ) {}

    public static function fromModel($model): ?self
    {
        $seo = $model?->seo;

        if (!$seo) return null;

        return new self(
            metaTitle:       $seo->meta_title,
            metaDescription: $seo->meta_description,
            ogTitle:         $seo->og_title,
            ogDescription:   $seo->og_description,
            ogImage:         $seo->og_image,
            ogImageAlt:      $seo->og_image_alt,
            canonicalUrl:    $seo->canonical_url,
            robots:          $seo->robots,
            robotsTxtExtras: $seo->robots_txt_extras ?? null,
            schema:          $seo->schema_data        ?? [],
            focusKeyword:    $seo->focus_keyword,
            inSitemap:       (bool)  ($seo->in_sitemap       ?? false),
            sitemapPriority: (float) ($seo->sitemap_priority ?? 0.5),
            changeFrequency: $seo->change_frequency,
            extraMeta:       $seo->extra_meta  ?? [],
            scriptTags:      $seo->script_tags ?? [],
        );
    }

    public function toArray(): array
    {
        return [
            'meta_title'        => $this->metaTitle,
            'meta_description'  => $this->metaDescription,
            'og_title'          => $this->ogTitle,
            'og_description'    => $this->ogDescription,
            'og_image'          => $this->ogImage,
            'canonical_url'     => $this->canonicalUrl,
            'robots'            => $this->robots,
            'robots_txt_extras' => $this->robotsTxtExtras,
            'schema'            => $this->schema,
            'extra_meta'        => $this->extraMeta,
            'script_tags'       => $this->scriptTags,
            'sitemap'           => [
                'include'          => $this->inSitemap,
                'priority'         => $this->sitemapPriority,
                'change_frequency' => $this->changeFrequency,
            ],
        ];
    }
}