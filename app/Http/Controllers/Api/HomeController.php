<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Home\HomeService;
use App\Traits\ApiResponse;

class HomeController extends Controller
{
    use ApiResponse;

    public function index(HomeService $homeService)
    {
        try {
            return $this->successResponse([
                'data' => [
                    'hero' => $homeService->get(),
                ],
                'meta' => (object)[]
            ], 'Home page fetched successfully');

        } catch (\Throwable $e) {

            return $this->errorResponse(
                $e->getMessage(),
                500
            );
        }
    }

}
