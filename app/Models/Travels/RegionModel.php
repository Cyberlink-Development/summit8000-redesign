<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class RegionModel extends Model
{
    protected $table = 'cl_trip_regions';
    protected $fillable = ['title', 'sub_title', 'uri', 'thumbnail', 'banner', 'excerpt', 'content', 'video', 'meta_keyword', 'meta_description', 'ordering', 'status'];

    public function trips()
    {
        return $this->belongsToMany('App\Models\Travels\TripModel', 'cl_trip_region_rel', 'region_id', 'trip_id');
    }

   
}