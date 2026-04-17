<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class TripScheduleModel extends Model
{
    protected $table = 'cl_trip_schedule';
    protected $fillable = ['trip_detail_id','start_date','end_date','group_size','price','remarks','availability','ordering'];
}
