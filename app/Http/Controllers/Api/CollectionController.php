<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PageSlug;
use App\Services\CollectionResolverService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class CollectionController extends Controller
{
    use ApiResponse;

    public function index(Request $request, CollectionResolverService $service)
    {
        $path = '/' . ltrim($request->query('path', ''), '/');

        try {
            $pageRoute = PageSlug::where('slug', $path)->first();

            if (!$pageRoute) {
                return $this->errorResponse('Page not found', 404);
            }

            return $this->successResponse(
                $service->resolve($pageRoute, $request),
                'Collection fetched successfully',
            );

        } catch (Exception $e) {
            Log::error('Failed to fetch collection', [
                'error' => $e->getMessage(),
                'context' => ['path' => $path],
                'trace' => $e->getTraceAsString(),
            ]);

            return $this->errorResponse(
                'Failed to fetch collection',
                500,
                ['error' => config('app.debug') ? $e->getMessage() : 'Internal server error'],
            );
        }
    }
}