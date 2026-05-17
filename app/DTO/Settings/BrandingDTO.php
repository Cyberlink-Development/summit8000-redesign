<?php

namespace App\DTO\Settings;

use App\DTO\Common\ImageDTO;

class BrandingDTO
{
    public function __construct(
        public readonly ImageDTO $logoLight,
        public readonly ImageDTO $logoDark,
        public readonly ImageDTO $favicon,
    ) {}

    // $model is your SettingModel instance
    public static function fromModel($model): self
    {
        return new self(
            // map your actual DB column names here
            logoLight: ImageDTO::make(
                $model->logo_light_url,
                $model->logo_light_alt ?? 'Logo - Light Mode'
            ),
            logoDark: ImageDTO::make(
                $model->logo_dark_url,
                $model->logo_dark_alt ?? 'Logo - Dark Mode'
            ),
            favicon: ImageDTO::make(
                $model->favicon_url,
                $model->favicon_alt ?? 'Favicon'
            ),
        );
    }

    public function toArray(): array
    {
        return [
            'logo' => [
                'light' => $this->logoLight->toArray(),
                'dark'  => $this->logoDark->toArray(),
            ],
            'favicon' => $this->favicon->toArray(),
        ];
    }
}