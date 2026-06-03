<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Services\Booking\BookingService;
use App\Traits\ApiResponse;
use Exception;
use Throwable;
use Illuminate\Http\Request;
use App\Mail\BookTrip;
use App\Mail\AdminBookingMail;
use Illuminate\Support\Facades\Mail;
use App\Models\PageSlug;
use Log;

class BookingController extends Controller
{
    use ApiResponse;

    public function __construct(
        protected BookingService $bookingService
    ) {
    }

    public function index($slug)
    {
        try {
            $data = $this->bookingService->getBookingPage($slug);

            return $this->successResponse(
                $data,
                'Booking page data fetched successfully'
            );

        } catch (Throwable $e) {

            return $this->errorResponse(
                $e->getMessage(),
                500
            );
        }
    }

    public function store(StoreBookingRequest $request)
    {
        try {
            $validated = $request->validated();
            $slug = '/' . ltrim($validated['trip_slug'], '/');
            $trip = PageSlug::with('sluggable')->where('slug', $slug)->first()?->sluggable;
            if (!$trip) {

                return $this->errorResponse(
                    'Trip not found',
                    404,
                    $trip
                );
            }

            $booking = $this->bookingService->store($validated);

            // Admin mail
            try {
                // Mail::to('info@summit8000.com')->send(new AdminBookingMail($booking));
            } catch (Throwable $e) {
                logger()->warning('Admin email failed: ' . $e->getMessage());
            }

            // User mail
            try {
                // Mail::to($booking->email)->send(new BookTrip($booking));
            } catch (Throwable $e) {
                logger()->warning('User email failed: ' . $e->getMessage());
            }

            return $this->successResponse(
                [],
                'Booking submitted successfully'
            );

        } catch (Exception $e) {

            Log::error($e->getMessage());

            return $this->errorResponse(
                $e->getMessage(),
                500
            );
        }
    }

}
