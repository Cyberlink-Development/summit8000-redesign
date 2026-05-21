<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PageSlug;

class SlugResolverController extends Controller
{
    public function resolve($slug)
    {
        $slugData = PageSlug::with('sluggable')
            ->where('slug', $slug)
            ->first();

        if (!$slugData) {

            return response()->json([
                'success' => false,
                'message' => 'Page not found',
                'data' => null,
            ], 404);
        }

        $model = $slugData->sluggable;

        $type = match (get_class($model)) {

            \App\Models\Travels\TripModel::class => 'trip',

            \App\Models\Posts\PostModel::class => 'post',

            \App\Models\Posts\PostTypeModel::class => 'posttype',

            \App\Models\Team\TeamModel::class => 'team',

            \App\Models\Travels\ActivityModel::class => 'activity',

            default => 'unknown',
        };

        return response()->json([
            'success' => true,
            'message' => 'Content resolved successfully',

            'data' => [
                'type' => $type,
                'data' => $model,
            ],

            'meta' => [],
        ]);
    }
}
