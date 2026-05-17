<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Settings\SettingsResource;
use App\Services\Settings\SettingsService;
use Illuminate\Http\JsonResponse;

class SettingsController extends Controller
{
    public function __construct(
        private readonly SettingsService $settingsService
    ) {}

    public function index(): JsonResponse
    {
        $data = $this->settingsService->getSettings();

        return $this->successResponse(
            new SettingsResource($data),
            'Settings fetched successfully'
        );
    }
}