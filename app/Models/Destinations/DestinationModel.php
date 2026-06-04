<?php

namespace App\Models\Destinations;

use App\Traits\HasSitemapUrl;
use Illuminate\Database\Eloquent\Model;
use App\Models\SeoMeta;
use App\Models\PageSlug;
class DestinationModel extends Model
{
    use HasSitemapUrl;
    
    protected $table = 'cl_trip_destinations';
    protected $fillable = ['title', 'uri', 'content', 'thumbnail', 'ordering', 'status','banner','video','brief'];

    public function trips()
    {
    return $this->belongsToMany('App\Models\Travels\TripModel', 'cl_trip_destination_rel', 'destination_id', 'trip_id');
    }
    public function activities(){
        return $this->belongsToMany('App\Models\Travels\ActivityModel','destination_activity_rel','destination_id', 'activity_id');
    }
    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
    public function slugs()
    {
        return $this->morphMany(PageSlug::class, 'sluggable');
    }
    protected static function booted()
    {
        static::deleting(function ($model) {
            $model->slugs()->delete();
        });
    }

}
