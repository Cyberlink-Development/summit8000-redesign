<?php

namespace App\Services\About;

use app\Models\PageSlug;
use App\Http\Resources\AboutPageResource;
use App\Http\Resources\GlobalCollection;
use App\Models\Posts\PostModel;
use App\Models\Settings\SettingModel;
use App\Services\Team\TeamListService;
use Illuminate\Http\Request;

class AboutPageService
{
    public function __construct(
        protected TeamListService $teamListService,
    ) {}

    public function handle(PageSlug $pageRoute, Request $request): GlobalCollection
    {
        $aboutSlug          = $pageRoute->sluggable;
        $aboutSlug['path']  = $pageRoute->slug;

        // ── Eager-load seo so SeoDTO::fromModel() can resolve it ──────────
        $aboutSlug->load('seo');

        // ── Settings row (single query, select only what's needed) ─────────
        $settings = SettingModel::select(
            'text1_title', 'text1_sub_title',
            'text2_title', 'text2_sub_title',
            'text3_title', 'text3_sub_title',
            'text4_title', 'text4_sub_title',
            'text5_title', 'text5_sub_title',
            'address', 'phone', 'usa_phone', 'email_primary',
        )->first();

        // ── All page sections in a single query ────────────────────────────
        $sections = PostModel::with('associated_posts', 'images')
            ->where('post_type', $aboutSlug->id)
            ->where('status', 1)
            ->get();

        // ── Team data from TeamService ─────────────────────────────────────
        // $team = $this->teamListService->aboutSection();

        return new GlobalCollection(
            resourceData: new AboutPageResource(
                aboutSlug: $aboutSlug,
                settings:  $settings,
                sections:  $sections,
            ),
        );
    }
}
