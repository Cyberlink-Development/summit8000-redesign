<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class AddonModel extends Model
{
    protected $table = 'cl_trip_addons';

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'thumbnail_alt',
        'price',
        'status',
        'ordering',
    ];

    public function trips()
    {
        return $this->belongsToMany(
            TripModel::class,
            'cl_trip_addon_rel',
            'addon_id',
            'trip_id'
        );
    }
}
