<?php

namespace App\Services;

use App\Enums\TemplateEnum;
use App\Models\PageSlug;
use Illuminate\Http\Request;

class CollectionResolverService
{
    public function resolve(PageSlug $pageRoute, Request $request)
    {
        $template = TemplateEnum::tryFrom($pageRoute->sluggable->template);

        if (!$template) {
            throw new \Exception("Invalid template: {$pageRoute->sluggable->template}");
        }

        $serviceClass = $template->collectionService();

        $service = app($serviceClass);

        return $service->handle($pageRoute, $request);
    }
}