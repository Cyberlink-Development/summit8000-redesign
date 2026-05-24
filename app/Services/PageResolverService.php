<?php

namespace App\Services;

use App\Enums\TemplateEnum;
use App\Models\PageSlug;
use Illuminate\Http\Request;

class PageResolverService
{
    public function resolve(PageSlug $pageRoute, Request $request)
    {
        // dd($pageRoute->sluggable->template);
        $template = TemplateEnum::tryFrom($pageRoute->sluggable->template);
        if (!$template) {
            throw new \Exception("Invalid template: {$pageRoute->sluggable->template}");
        }

        $serviceClass = $template->service();

        $service = app($serviceClass);
        return $service->handle($pageRoute, $request);
    }
}
