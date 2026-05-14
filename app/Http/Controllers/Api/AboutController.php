<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AboutPageService;
use App\Traits\ApiResponse;

class AboutController extends Controller
{
    use ApiResponse;

    public function __construct(
        protected AboutPageService $service
    ) {}

    public function index()
    {
        try {
            $dto = $this->service->getPageData();

            return $this->successResponse([
                'data' => $dto->toArray(),
                'meta' => []
            ], 'About page fetched successfully');
        } catch (\Throwable $e) {

            return $this->errorResponse(
                $e->getMessage(),
                500
            );
        }
    }
}
