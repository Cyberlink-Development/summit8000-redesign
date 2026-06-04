<?php

namespace App\Traits;

trait HasSitemapUrl
{
    public function sitemapUrl(): ?string
    {
        if (method_exists($this, 'customSitemapUrl')) {
            return $this->customSitemapUrl();
        }

        if (!method_exists($this, 'slugs')) {
            return null;
        }
        
        $slug = $this->slugs()->first();

        if (!$slug) {
            return null;
        }

        // return '/' . ltrim($slug->slug, '/');
        $baseUrl = rtrim(config('app.frontend_url'), '/');
        $path = '/' . ltrim($slug->slug, '/');

        return $baseUrl . $path;
    }
}