<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Booking\BookingService;
use App\Traits\ApiResponse;
use Throwable;
use Illuminate\Http\Request;
use App\Mail\BookTrip;
use App\Mail\AdminBookingMail;
use Illuminate\Support\Facades\Mail;
use App\Models\PageSlug;

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

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'slug' => 'required|string',
                'title' => 'required|string',
                'price' => 'required',
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'country' => 'required|string|max:255',
                'phone' => 'required|string|max:50',
                'total_travellers' => 'required|integer|min:1',
                'message' => 'nullable|string',
                'payment_type' => 'nullable|string',
                'trip_start_date' => 'nullable|date',
                'agree_terms' => 'required|accepted',
            ]);
            $slug = '/' . ltrim($validated['slug'], '/');
            $trip = PageSlug::with('sluggable')->where('slug', $slug)->first()?->sluggable;
            if (!$trip || !$trip instanceof TripModel) {

                return $this->errorResponse(
                    'Trip not found',
                    404
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

        } catch (Throwable $e) {

            return $this->errorResponse(
                $e->getMessage(),
                500
            );
        }
    }

}
