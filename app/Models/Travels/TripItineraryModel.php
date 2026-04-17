<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripItineraryModel extends Model
{
    protected $table = 'cl_trip_itinerary';
    protected $fillable = ['trip_detail_id','days', 'category_id','title','content','ordering','max_altitude','distance','duration'];
}
