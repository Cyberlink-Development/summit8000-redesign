<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Model;

class TripTailormadeModel extends Model
{
      protected $table = 'cl_trip_tailor_made';
      protected $fillable = ['title','trip_id','num_ppl','duration','start_date','full_name','contact','email','country','message'];

      public function tailorMakeTrips()
      {
          return $this->belongsTo('App\Models\Travels\TripModel', 'trip_id');
      }
}
