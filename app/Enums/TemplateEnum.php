<?php

namespace App\Enums;

use App\Services\Blog\BlogService;
use App\Services\Templates\TripListService;
use App\Services\Templates\ActivityListService;
use App\Services\Templates\GalleryService;
use App\Services\Collections\BlogCollectionService;
use App\Services\Collections\TripCollectionService;
use App\Services\Collections\ActivityCollectionService;
use App\Services\Collections\GalleryCollectionService;

enum TemplateEnum: string
{
    case BLOG_LIST = 'blog-list';
    case TRIP_LIST = 'trip-list';
    case ACTIVITY_LIST = 'activity-list';
    case GALLERY = 'gallery';

    public function service(): string
    {
        return match ($this) {
            self::BLOG_LIST => BlogService::class,
            // self::TRIP_LIST => TripListService::class,
            // self::ACTIVITY_LIST => ActivityListService::class,
            // self::GALLERY => GalleryService::class,
        };
    }

    public function collectionService(): string
    {
        return match ($this) {
            // self::BLOG_LIST     => BlogCollectionService::class,
            // self::TRIP_LIST     => TripCollectionService::class,
            // self::ACTIVITY_LIST => ActivityCollectionService::class,
            // self::GALLERY       => GalleryCollectionService::class,
        };
    }
}