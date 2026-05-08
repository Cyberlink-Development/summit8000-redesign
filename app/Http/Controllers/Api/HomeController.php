<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Home\HeroService;
use App\Traits\ApiResponse;

class HomeController extends Controller
{
    use ApiResponse;

    public function index(HeroService $heroService)
    {
        try {
            return $this->successResponse([
                'data' => [
                    'hero' => $heroService->get(),
                ],
                'meta' => (object)[]
            ], 'Home page fetched successfully');

        } catch (\Throwable $e) {
            \Log::error('Home API Error: ' . $e->getMessage());

            return $this->errorResponse();
        }
    }

}
