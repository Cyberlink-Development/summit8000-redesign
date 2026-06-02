<?php

namespace App\Services\Booking;

use App\DTO\Booking\BookingPageDTO;
use App\Models\PageSlug;
use App\Models\Inquiry\BookingModel;

class BookingService
{
    public function getBookingPage(string $slug): array
    {
        $path = '/' . ltrim($slug, '/');

        $trip = PageSlug::with('sluggable.seo')->where('slug', $path)->firstOrFail()->sluggable;
        // dd($trip);

        if (!$trip) {
        abort(404, 'Trip not found');
        }


        return (new BookingPageDTO($trip))->toArray();
    }

    public function store(array $data): BookingModel
    {
        $booking = BookingModel::create([
            'trip_id' => $data['trip_id'] ?? null,
            'title' => $data['title'] ?? null,
            'price' => $data['price'] ?? null,
            'message' => $data['message'] ?? null,
            'full_name' => $data['full_name'] ?? null,
            'total_travellers' => $data['total_travellers'] ?? 1,
            'nationality' => $data['nationality'] ?? null,
            'country' => $data['country'] ?? null,
            'address' => $data['address'] ?? null,
            'zip' => $data['zip'] ?? null,
            'email' => $data['email'] ?? null,
            'gender' => $data['gender'] ?? null,
            'tshirt_size' => $data['tshirt_size'] ?? null,
            'phone' => $data['phone'] ?? null,
            'medication' => $data['medication'] ?? null,
            'restrictions' => $data['restrictions'] ?? null,
            'trip_start_date' => $data['trip_start_date'] ?? null,
            'trip_end_date' => $data['trip_end_date'] ?? null,
            'trip_days' => $data['trip_days'] ?? null,
            'dob' => $data['dob'] ?? null,
            'passport_number' => $data['passport_number'] ?? null,
            'passport_expire' => $data['passport_expire'] ?? null,

            'paid_status' => $data['paid_status'] ?? 'pending',
            'payment_type' => $data['payment_type'] ?? null,
            'hear' => $data['hear'] ?? null,

            // Flight
            'flight_status' => $data['flight_status'] ?? 0,
            'arrival_date' => $data['arrival_date'] ?? null,
            'arrival_flight_number' => $data['arrival_flight_number'] ?? null,
            'pickup' => $data['pickup'] ?? 0,
            'departure_date' => $data['departure_date'] ?? null,
            'departure_flight_number' => $data['departure_flight_number'] ?? null,
            'dropoff' => $data['dropoff'] ?? 0,

            // Insurance
            'insurance' => $data['insurance'] ?? null,
            'agree_terms' => $data['agree_terms'] ?? 0,
        ]);


        return $booking;
    }

}
