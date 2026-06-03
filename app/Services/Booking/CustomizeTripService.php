<?php

namespace App\Services\Booking;

use App\DTO\Booking\CustomizeTripDTO;
use App\Http\Resources\CustomizeTripListResource;
use App\Models\Inquiry\CustomizeModel;
use App\Models\Settings\SettingModel;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;

class CustomizeTripService
{
    public function getPageData(): array
    {
        $setting = SettingModel::first();

        $trips = TripModel::with('slugs')->where('status', 1)->whereHas('slugs')->get();
        // dd($trips);
        return (new CustomizeTripDTO(
            setting: $setting,
            trips: $trips
        ))->toArray();
    }

    public function getTripsList(Request $request)
    {
        $search = trim($request->input('search', ''));

        $trips = TripModel::with('slugs')
            ->where('status', 1)
            ->whereHas('slugs')
            ->when($search !== '', function ($query) use ($search) {
                $query->where('trip_title', 'LIKE', "%{$search}%");
            })
            ->paginate(8);
        // return CustomizeTripListResource::collection($trips);
        $nextPageUrl = $trips->hasMorePages()
            ? "/trips?page=" . ($trips->currentPage() + 1) . ($search !== '' ? "&search=" . urlencode($search) : '')
            : null;
        return [
            'data' => CustomizeTripListResource::collection($trips),
            'meta' => [
                'current_page' => $trips->currentPage(),
                'per_page' => $trips->perPage(),
                'total' => $trips->total(),
                'last_page' => $trips->lastPage(),
                'from' => $trips->firstItem(),
                'to' => $trips->lastItem(),
                'has_more' => $trips->hasMorePages(),
            ],
            'links' => [
                'next' => $nextPageUrl,
            ],
        ];
    }

   public function store(array $data): CustomizeModel
    {
        return CustomizeModel::create([
            'trip_id' => $data['trip_id'],
            'title' => $data['title'],
            'name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'comments' => $data['message'] ?? null,
            'no_of_people' => $data['total_travellers'] ?? null,
            'trip_start_date' => $data['trip_start_date'] ?? null,
            'trip_end_date' => $data['trip_end_date'] ?? null,
            'type' => $data['group_size'] ?? null,
            'duration' => null,
        ]);
    }
}
