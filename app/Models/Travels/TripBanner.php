<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripBanner extends Model
{
    use HasFactory;
    protected $table = 'trip_banners';
    protected $fillable = ['trip_detail_id','title','banner','video','ordering'];
}
