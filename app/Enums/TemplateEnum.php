<?php

namespace App\Enums;

use App\Services\Blog\BlogService;
use App\Services\Collections\TeamListCollectionService;
use App\Services\Collections\TripCategoryCollectionService;
use App\Services\Team\TeamDetailService;
use App\Services\Blog\BlogDetailService;
use App\Services\Team\TeamListService;
use App\Services\Trip\TripListService;
use App\Services\About\AboutPageService;
use App\Services\Trip\TripDetailService;
use App\Services\Trip\TripCategoryService;
use App\Services\Templates\ActivityListService;
use App\Services\Templates\GalleryService;
use App\Services\Collections\BlogCollectionService;
use App\Services\Collections\TripCollectionService;
use App\Services\Collections\ActivityCollectionService;
use App\Services\Collections\GalleryCollectionService;

enum TemplateEnum: string
{
    case BLOG_LIST = 'blog-list';
    case BLOG_DETAIL = 'blog-detail';
    case TEAM_LIST = 'team-list';
    case TEAM_DETAIL = 'team-member';
    case TRIP_LIST = 'trip-list';
    case TRIP_DETAIL = 'trip-detail';
    case ACTIVITY_LIST = 'activity-list';
    case GALLERY = 'gallery';
    case ABOUT = 'about';
    case TRIP_CATEGORY = 'category';

    public function service(): string
    {
        return match ($this) {
            self::BLOG_LIST => BlogService::class,
            self::BLOG_DETAIL => BlogDetailService::class,
            self::TEAM_LIST => TeamListService::class,
            self::TEAM_DETAIL => TeamDetailService::class,
            self::TRIP_LIST => TripListService::class,
            self::TRIP_DETAIL => TripDetailService::class,
            self::TRIP_CATEGORY => TripCategoryService::class,
            // self::ACTIVITY_LIST => ActivityListService::class,
            // self::GALLERY => GalleryService::class,
            self::ABOUT => AboutPageService::class,
        };
    }

    public function collectionService(): string
    {
        return match ($this) {
            self::BLOG_LIST     => BlogCollectionService::class,
            self::TEAM_LIST => TeamListCollectionService::class,
            self::TRIP_LIST     => TripCollectionService::class,
            self::TRIP_CATEGORY => TripCategoryCollectionService::class
            // self::ACTIVITY_LIST => ActivityCollectionService::class,
            // self::GALLERY       => GalleryCollectionService::class,
        };
    }
}
