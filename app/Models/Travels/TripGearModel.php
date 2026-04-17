<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripGearModel extends Model
{
    protected $table = 'cl_trip_gear';
    protected $fillable = ['trip_detail_id','title','content','thumbnail','video','ordering','status'];
}
