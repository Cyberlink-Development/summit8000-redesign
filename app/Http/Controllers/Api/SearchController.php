<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Collections\SearchCollectionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class SearchController extends Controller
{
    public function __construct(protected SearchCollectionService $searchCollectionService) {}

    public function index(Request $request): JsonResponse
    {
        try {
            return $this->successResponse(
                $this->searchCollectionService->handle($request),
                'Search results fetched successfully',
            );
        } catch (Exception $e) {
            Log::error('Search failed', [
                'error'   => $e->getMessage(),
                'keyword' => $request->query('keyword'),
                'trace'   => $e->getTraceAsString(),
            ]);

            return $this->errorResponse(
                'Failed to fetch search results',
                500,
                ['error' => config('app.debug') ? $e->getMessage() : 'Internal server error'],
            );
        }
    }
}