<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripGradeModel extends Model
{
     protected $table = 'cl_trip_grade';
     protected $fillable = ['grade'];
}
