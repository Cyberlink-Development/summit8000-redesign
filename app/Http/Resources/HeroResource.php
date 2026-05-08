<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeroResource 
{
    public function __construct(
        private $setting,
        private $banners
    ) {}

    public function toArray()
    {
        return array_filter([
            'caption' => $this->setting->hero_caption,
            'title' => $this->setting->hero_title,
            'description' => $this->setting->hero_description,

            'cta_primary' => $this->cta(
                $this->setting->hero_cta_primary_label,
                $this->setting->hero_cta_primary_href
            ),

            'cta_secondary' => $this->cta(
                $this->setting->hero_cta_secondary_label,
                $this->setting->hero_cta_secondary_href
            ),

            'stats' => collect($this->setting->hero_stats ?? []),

            // 👇 THIS is what you wanted
            'banners' => BannerResource::collection($this->banners),

        ], fn ($v) => !is_null($v));
    }

    private function cta($label, $href)
    {
        if (!$label || !$href) return null;

        return [
            'label' => $label,
            'href' => $href,
            'link_type' => str_starts_with($href, 'http') ? 'external' : 'internal',
        ];
    }
}
