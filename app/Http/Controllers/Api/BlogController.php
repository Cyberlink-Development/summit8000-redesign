<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Blog\BlogDetailService;
use App\Services\Blog\BlogService;
use App\Traits\ApiResponse;

class BlogController extends Controller
{
    use ApiResponse;

    public function index(BlogService $blogService)
    {
        try {
            return $this->successResponse(
                $blogService->get(),
                'Posts fetched successfully'
            );
        } catch (\Throwable $e) {

            return $this->errorResponse(
                $e->getMessage(),
                500 
            );
        }
    }
    public function show($slug, BlogDetailService $blogDetailService)
    {
        try {
            return $this->successResponse(
                $blogDetailService->get($slug),
                'Blog post fetched successfully'
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
