<?php

namespace App\Http\Controllers\Api;

use Throwable;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Services\Booking\CustomizeTripService;
use App\Mail\AdminCustomizeTrip;
use App\Mail\UserCustomizeTrip;
use App\Models\PageSlug;

class CustomizeTripController extends Controller
{
    use ApiResponse;

    public function __construct(
        protected CustomizeTripService $customizeTripService
    ) {}

    public function index()
    {
        try {

            $data = $this->customizeTripService->getPageData();

            return $this->successResponse(
                $data,
                'Customize trip page data fetched successfully'
            );

        } catch (Throwable $e) {

            return $this->errorResponse(
                $e->getMessage(),
                500
            );
        }
    }

    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'slug' => 'required|string',
                'title' => 'required|string|max:255',
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'country' => 'required|string|max:255',
                'phone' => 'required|string|max:50',
                'group_size' => 'nullable|string|max:100',
                'total_travellers' => 'nullable|integer|min:1',
                'trip_start_date' => 'nullable|date',
                'trip_end_date' => 'nullable|date',
                'message' => 'nullable|string',
                'type' => 'nullable|string|max:100',
            ]);
            $slug = '/' . ltrim($validated['slug'], '/');
            $trip = PageSlug::with('sluggable')->where('slug', $slug)->first()?->sluggable;
            if (!$trip || !$trip instanceof TripModel) {

                return $this->errorResponse(
                    'Trip not found',
                    404
                );
            }

            $savedTrip = $this->customizeTripService->store($validated);

            // Admin mail
            try {
                // Mail::to('info@summit8000.com')->send(new AdminCustomizeTrip($savedTrip));
            } catch (Throwable $e) {
                logger()->warning(
                    'Admin email failed: ' . $e->getMessage()
                );
            }

            // User mail
            try {
                // Mail::to($trip->email)->send(new UserCustomizeTrip($savedTrip));
            } catch (Throwable $e) {

                logger()->warning(
                    'User email failed: ' . $e->getMessage()
                );
            }

            return $this->successResponse(
                [],
                'Customize trip enquiry submitted successfully'
            );

        } catch (Throwable $e) {

            return $this->errorResponse(
                $e->getMessage(),
                500
            );
        }
    }
}
