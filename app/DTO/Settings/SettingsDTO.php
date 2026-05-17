<?php

namespace App\DTO\Settings;

use App\DTO\Common\SeoDTO;
use App\Enums\ThemeMode;

class SettingsDTO
{
    public function __construct(
        public readonly ?string      $siteName,
        public readonly ?BrandingDTO $branding,
        public readonly ?array       $displayMode,
        public readonly ?HeaderDTO   $header,
        public readonly ?FooterDTO   $footer,
        public readonly ?SeoDTO     $seo,
    ) {}

    public static function fromData(array $data): self
    {
        $settings = $data['settings'] ?? null;
        $menus    = $data['menus'] ?? [];
        $pages    = $data['pages'] ?? [];

        return new self(
            siteName: $settings->site_name ?? null,
            branding: $settings ? BrandingDTO::fromModel($settings) : null,
            displayMode: [
                'enabled' => true,
                'default' => ThemeMode::Light->value,
            ],
            header: $menus ? HeaderDTO::fromData($menus) : null,
            footer: $settings ? FooterDTO::fromData($settings, $pages) : null,
            seo: $settings ? SeoDTO::fromModel($settings) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'site_name'    => $this->siteName,
            'branding'     => $this->branding?->toArray() ?? [],
            'display_mode' => $this->displayMode ?? [],
            'header'       => $this->header?->toArray() ?? [],
            'footer'       => $this->footer?->toArray() ?? [],
            'seo'          => $this->seo?->toArray() ?? [],
        ];
    }
}