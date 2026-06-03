<?php

namespace App\Services\Terms;

use App\Models\PageSlug;
use App\Http\Resources\TermsPageResource;
use App\Http\Resources\GlobalCollection;
use App\Models\Posts\PostModel;
use App\Models\Settings\SettingModel;
use Illuminate\Http\Request;

class TermsPageService
{
    public function __construct()
    {
    }

    public function handle(PageSlug $pageRoute, Request $request): GlobalCollection
    {
        $termsSlug = $pageRoute->sluggable;
        $termsSlug['path'] = $pageRoute->slug;

        $termsSlug->load('seo');

        $sections = PostModel::with(['associated_posts', 'images'])
            ->where('post_type', $termsSlug->id)
            ->where('status', 1)
            ->get();

            // dd($sections ,$termsSlug);
        return new GlobalCollection(
            resourceData: new TermsPageResource(
                termsSlug: $termsSlug,
                sections: $sections,
            ),
        );
    }
}
