<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripTypeModel extends Model
{
      protected $table = 'cl_trip_type';
      protected $fillable = ['trip_type'];
}
