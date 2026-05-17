<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\About\AboutResource;
use App\Services\About\AboutPageService;
use Exception;
use Illuminate\Http\JsonResponse;
use Log;

class AboutController extends Controller
{
    public function __construct(
        private readonly AboutPageService $service
    ) {}

    public function index(): JsonResponse
    {
        try {
            $data = $this->service->getPageData();

            return $this->successResponse(
                new AboutResource($data),
                'About page fetched successfully'
            );
        } catch (Exception $e) {
            Log::error("Failed to fetch about data: ", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return $this->errorResponse(
                app()->isLocal() ? $e->getMessage() : trans('common.internal-server-error'),
                null,
                500
            );
        }
    }
}