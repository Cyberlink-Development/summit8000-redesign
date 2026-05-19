<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Team\TeamDetailService;
use App\Services\Team\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
     public function index(TeamService $teamService)
    {
        try {
            return $this->successResponse(
                $teamService->get(),
                'Team members fetched successfully'
            );
        } catch (\Throwable $e) {

            return $this->errorResponse(
                $e->getMessage(),
                500
            );
        }
    }

    public function show($slug, TeamDetailService $teamService)
    {
        try {
            return $this->successResponse(
                $teamService->get($slug),
                'Team member fetched successfully'
            );
        } catch (\Throwable $e) {

            \Log::error($e);

               return $this->errorResponse(
                $e->getMessage(),
                500
            );
        }
    }
}
