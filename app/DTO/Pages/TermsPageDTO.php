<?php

namespace App\DTO\Pages;

use App\DTO\Common\SeoDTO;
use Illuminate\Support\Collection;

class TermsPageDTO
{
    public function __construct(
        public readonly string $template,
        public readonly array $hero,
        public readonly string $excerpt,
        public readonly array $items,
        public readonly ?SeoDTO $seo,
    ) {
    }

    public static function fromModel(
        object $termsSlug,
        Collection $sections,
    ): self {

        return new self(
            template: $termsSlug->template,

            hero: [
                'banner' => [
                    'url' => !empty($termsSlug->banner)
                        ? asset('uploads/medium/' . $termsSlug->banner)
                        : '/images/placeholder-banner.webp',

                    'alt' => $termsSlug->post_type . ' Banner',
                ],

                'breadcrumb' => [
                    'previous' => [
                        'label' => 'Home',
                        'href' => '/',
                        'type' => 'internal',
                    ],

                    'current' => [
                        'label' => $termsSlug->post_type,
                    ],
                ],

                'caption' => 'Legal · Policies · Agreement',

                'title' => $termsSlug->post_type,

                'description' => $termsSlug->content
                    ?? 'Please read these terms carefully before booking an expedition or using our services.',
            ],

            excerpt: $termsSlug->content ?? '',

            items: $sections->map(function ($section) {

                return [
                    'slug' => $section->uri,
                    'title' => $section->post_title,
                    'content' => $section->post_content ?? '',
                ];

            })->values()->toArray(),

            seo: SeoDTO::fromModel($termsSlug),
        );
    }

    public function toArray(): array
    {
        return [
            'template' => $this->template,
            'hero' => $this->hero,
            'excerpt' => $this->excerpt,
            'items' => $this->items,
            'seo' => $this->seo,
        ];
    }
}
