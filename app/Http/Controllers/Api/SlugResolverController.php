<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PageSlug;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\PageResolverService;

class SlugResolverController extends Controller
{
    public function resolve(Request $request, PageResolverService $service)
    {
        $path = '/' . ltrim($request->query('path'), '/');
        try{

            $slugData = PageSlug::with('sluggable')
                ->where('slug', $path)
                ->first();

            if (!$slugData) {

                return response()->json([
                    'success' => false,
                    'message' => 'Page not found'
                ], 404);
            }

            // $model = $slugData->sluggable;

            // $type = match (get_class($model)) {

            //     \App\Models\Travels\TripModel::class => 'trip',

            //     \App\Models\Posts\PostModel::class => 'post',

            //     \App\Models\Posts\PostTypeModel::class => 'posttype',

            //     \App\Models\Team\TeamModel::class => 'team',

            //     \App\Models\Travels\ActivityModel::class => 'activity',

            //     default => 'unknown',
            // };

            // return response()->json([
            //     'success' => true,
            //     'message' => 'Content resolved successfully',

            //     'data' => [
            //         'type' => $type,
            //         'data' => $model,
            //     ],

            //     'meta' => [],
            // ]);

            return $this->successResponse($service->resolve($slugData, $request), 'Successfully fetch data');
        } catch (Exception $e){
            Log::error('Failed to fetch data: ', [
                'error' => $e->getMessage(),
                'context' => [
                    'path' => $path,
                ],
                'trace' => $e->getTraceAsString(),
            ]);

            return $this->errorResponse(
                'Failed to fetch data',
                500,
                ['error' => config('app.debug') ? $e->getMessage() : trans('common.internal-server-error')],
            );
        }
    }
}
