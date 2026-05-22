<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Trip\TripDetailService;
use App\Services\Trip\TripListService;

class TripController extends Controller
{
    public function index($parent, TripListService $service)
    {
        try {
            $page = (int) request()->get('page', 1);
            $data = $service->get($parent, $page);

            return response()->json([
                'success' => true,
                'message' => 'Trips fetched successfully',
                'data'    => [
                    'data'  => $data->toArray(),
                    'meta'  => $data->meta,
                    'links' => $data->links,
                ],
            ]);
        } catch (\Throwable $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function category($slug, TripListService $service)
    {
        try {
            $page = (int) request()->get('page', 1);
            $data = $service->category($slug, $page);

            return response()->json([
                'success' => true,
                'message' => 'Trips fetched successfully',
                'data'    => [
                    'data'  => $data->toArray(),
                    'meta'  => $data->meta,
                    'links' => $data->links,
                ],
            ]);
        } catch (\Throwable $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
    // public function index($parent, TripListService $service)
    // {
    //     try {
    //         $data = $service->get($parent);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Trips fetched successfully',
    //             'data' => [
    //                 'data' => $data->toArray(),
    //             ],
    //             'meta' => [],
    //         ]);
    //     } catch (\Throwable $e) {

    //         return $this->errorResponse(
    //             $e->getMessage(),
    //             500
    //         );
    //     }
    // }
    // public function category($slug, TripListService $service)
    // {
    //     try {
    //         $data = $service->category($slug);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Trips fetched successfully',
    //             'data' => [
    //                 'data' =>  $data->toArray(),
    //             ],
    //             'meta' => [],
    //         ]);
    //     } catch (\Throwable $e) {

    //         return $this->errorResponse(
    //             $e->getMessage(),
    //             500
    //         );
    //     }
    // }
    public function detail($slug, TripDetailService $service)
    {
        try {
            $data = $service->get($slug);

            return response()->json([
                'success' => true,
                'message' => 'Trip details fetched successfully',
                'data' => [
                    'data' => $data->toArray(),
                ],
                'meta' => [],
            ]);
        } catch (\Throwable $e) {

            return $this->errorResponse(
                $e->getMessage(),
                500
            );
        }
    }
}
