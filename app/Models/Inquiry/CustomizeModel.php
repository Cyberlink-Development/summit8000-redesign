<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Model;

class CustomizeModel extends Model
{
        protected $table = 'cl_trip_customize';
        protected $fillable = ['title','trip_id','name','email','phone','comments','no_of_people','duration','trip_start_date','trip_end_date','country','type'];

        public function customizeTrips()
      {
          return $this->belongsTo('App\Models\Travels\TripModel', 'trip_id');
      }
}


