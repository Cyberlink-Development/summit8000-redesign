<?php

namespace App\Models\Inquiry;

use App\Models\Travels\TripModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inquiry\TripBookingTraveler;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = 'cl_trip_booking';

    protected $fillable = [

        'trip_id',
        'title',
        'price',
        'message',

        // Lead traveler
        'full_name',
        'total_travellers',
        'nationality',
        'country',
        'address',
        'zip',
        'email',
        'gender',
        'tshirt_size',
        'phone',
        'medication',
        'restrictions',
        'trip_start_date',
        'trip_end_date',
        'trip_days',
        'dob',
        'passport_number',
        'passport_expire',

        // Payment
        'paid_status',
        'payment_type',

        // Other
        'hear',

        // Flight
        'flight_status',
        'arrival_date',
        'arrival_flight_number',
        'pickup',

        'departure_date',
        'departure_flight_number',
        'dropoff',

        // Insurance
        'insurance',

        // Terms
        'agree_terms',
    ];

    public function bookTrips()
    {
        return $this->belongsTo(TripModel::class, 'trip_id');
    }

    public function flight()
    {
      return $this->hasOne(FlightDetails::class,'booking_id');
    }

    public function insurance()
    {
      return $this->hasOne(Insurance::class,'booking_id');
    }

    public function emergency()
    {
      return $this->hasOne(Emergency::class,'booking_id');
    }
    public function travelers()
    {
        return $this->hasMany(TripBookingTraveler::class, 'trip_booking_id');
    }
}
