<?php

namespace App\Models\Inquiry;

use Illuminate\Database\Eloquent\Model;

class TripFilmMakingModel extends Model
{
      protected $table = 'cl_trip_film_making';
      protected $fillable = ['title','trip_id','num_ppl','duration','start_date','full_name','contact','email','country','message'];

      public function filmMakingTrips()
    {
        return $this->belongsTo('App\Models\Travels\TripModel', 'trip_id');
    }

}

