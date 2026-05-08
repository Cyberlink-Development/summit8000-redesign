<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponse
{
    protected function successResponse(
        mixed $data,
        ?string $message = null,
        int $code = Response::HTTP_OK
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

 protected function errorResponse(
    string $message = 'Something went wrong',
    int $code = 500,
    $errors = null
) {
    return response()->json([
        'success' => false,
        'message' => $message,
        'errors' => $errors,
    ], $code);
}
}