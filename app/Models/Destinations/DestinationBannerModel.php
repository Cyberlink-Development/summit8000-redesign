<?php

namespace App\Models\Destinations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationBannerModel extends Model
{
    use HasFactory;
    protected $table = 'cl_multiple_banner';
    protected $fillable = ['title', 'banner_id', 'picture'];

    public function destinations()
    {
        return $this->belongsToMany('App\Models\Destinations\DestinationModel', 'cl_trip_destination_rel', 'trip_id', 'destination_id');
    }
}
