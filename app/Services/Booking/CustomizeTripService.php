<?php

namespace App\Services\Booking;

use App\DTO\Booking\CustomizeTripDTO;
use App\Models\Inquiry\CustomizeModel;
use App\Models\Settings\SettingModel;
use App\Models\Travels\TripModel;

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
