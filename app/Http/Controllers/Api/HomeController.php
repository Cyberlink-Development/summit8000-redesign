<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Home\HomeService;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Log;
use Exception;

class HomeController extends Controller
{
    use ApiResponse;

    public function index(HomeService $homeService)
    {
        try {
            $data = [
                'data' => $homeService->get(),
                'meta' => (object)[]
            ];
            return $this->successResponse(
                $data, 'Home page fetched successfully');

        } catch (Exception $e) {
            Log::error('Failed to fetch home page data: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return $this->errorResponse(
                'Failed to fetch home data',
                500,
                ['error' => config('app.debug') ? $e->getMessage() : trans('common.internal-server-error')],
            );
        }
    }

}
