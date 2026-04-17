<?php

namespace App\Models\Inquiry;

use App\Models\Travels\TripModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = 'cl_trip_booking';
    protected $fillable = ['trip_id','title','full_name', 'total_travellers', 'nationality', 'country', 'address', 'zip', 'email', 'gender', 'tshirt_size', 'phone', 'medication', 'restrictions', 'trip_start_date', 'trip_end_date', 'trip_days', 'dob', 'passport_number', 'passport_expire', 'paid_status', 'payment_type', 'hear'];
    
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
}
