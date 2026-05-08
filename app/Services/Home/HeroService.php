<?php

namespace App\Services\Home;

use App\Models\BannerModel;

class HeroService
{
    public function get()
    {
        $banners = \App\Models\Banners\BannerModel::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        if ($banners->isEmpty()) {
            return null;
        }

        // 👇 Use first banner as hero
        $banner = $banners->first();

        return [
            'banner' => $this->formatBanner($banner),

            'caption' => $banner->caption,
            'title' => $banner->title,
            'description' => $banner->description,

            'cta' => [
                'primary' => $this->cta(
                    $banner->link_label ?? 'Explore Expeditions',
                    $banner->link
                ),

                'secondary' => $this->cta(
                    $banner->link_secondary_label ?? 'Our Story',
                    $banner->link_secondary
                ),
            ],
        ];
    }

    private function formatBanner($banner)
    {
        return [
            'url' => url($banner->picture),
            'alt' => $banner->picture_alt ?? $banner->title,
        ];
    }

    private function cta($label, $href)
    {
        if (!$label || !$href) {
            return null;
        }

        return [
            'label' => $label,
            'href' => $href,
            'type' => str_starts_with($href, 'http') ? 'external' : 'internal',
        ];
    }
}
