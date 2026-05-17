<?php

namespace App\DTO\Settings;

use App\DTO\Common\SeoDTO;
use App\Enums\ThemeMode;

class SettingsDTO
{
    public function __construct(
        public readonly string      $siteName,
        public readonly BrandingDTO $branding,
        public readonly array       $displayMode,
        public readonly HeaderDTO   $header,
        public readonly FooterDTO   $footer,
        public readonly ?SeoDTO     $seo,
    ) {}

    public static function fromData(array $data): self
    {
        $settings = $data['settings'];
        $menus    = $data['menus'];
        $pages    = $data['pages'];

        return new self(
            siteName:    $settings->site_name,
            branding:    BrandingDTO::fromModel($settings),
            displayMode: [
                'enabled' => true,
                'default' => ThemeMode::Light
            ],
            header: HeaderDTO::fromData($menus),
            footer: FooterDTO::fromData($settings, $pages),
            seo:    SeoDTO::fromModel($settings),
        );
    }

    public function toArray(): array
    {
        return [
            'site_name'    => $this->siteName,
            'branding'     => $this->branding->toArray(),
            'display_mode' => $this->displayMode,
            'header'       => $this->header->toArray(),
            'footer'       => $this->footer->toArray(),
            'seo'          => $this->seo?->toArray(),
        ];
    }
}