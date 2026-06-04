<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SeoMeta;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function sitemapGenerator(): JsonResponse
    {
        $seoEntries = SeoMeta::query()
            ->where('in_sitemap', true)
            ->where('robots', 'like', 'index,%')
            ->with('seoable')
            ->get();

        $sitemap = [];

        foreach ($seoEntries as $seo) {

            $model = $seo->seoable;

            if (!$model) {
                continue;
            }

            $url = $model->sitemapUrl();

            if (!$url) {
                continue;
            }

            $sitemap[] = [
                'url' => $url,
                'priority' => (float) ($seo->sitemap_priority ?? 0.8),
                'changefreq' => $seo->change_frequency ?? 'weekly',
                'lastmod' => optional($model->updated_at)?->toDateString() ?? now()->toDateString(),
            ];
        }

        // SORT: priority DESC → lastmod DESC
        usort($sitemap, function ($a, $b) {
            if ($a['priority'] !== $b['priority']) {
                return $b['priority'] <=> $a['priority'];
            }

            return strtotime($b['lastmod']) <=> strtotime($a['lastmod']);
        });

        return $this->successResponse($sitemap, 'Sitemap fetch successfully');
    }
}
