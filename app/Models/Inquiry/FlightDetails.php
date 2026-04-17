<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightDetails extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id','airline_name','airline_no','arrival_from','arrival_date','arrival_time','departure_airline_name','departure_airline_no','departure_from', 'departure_date', 'departure_time'];
}
