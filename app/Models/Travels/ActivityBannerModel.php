<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityBannerModel extends Model
{
    use HasFactory;
    protected $table = 'activity_banner';
    protected $fillable = [ 'activity_id', 'picture'];

    public function activities()
    {
        return $this->belongsToMany('App\Models\Travels\ActivityModel', 'cl_trip_activity_rel', 'trip_id', 'activity_id');
    }
}
