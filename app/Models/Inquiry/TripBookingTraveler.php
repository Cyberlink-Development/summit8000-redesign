<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inquiry\BookingModel;

class TripBookingTraveler extends Model
{
    use HasFactory;

    protected $table = 'cl_trip_booking_travelers';

    protected $fillable = [
        'trip_booking_id',
        'full_name',
        'gender',
        'email',
        'nationality',
        'dob',
        'mobile',
        'passport_no',
    ];

    public function booking()
    {
        return $this->belongsTo(BookingModel::class, 'trip_booking_id');
    }
}
