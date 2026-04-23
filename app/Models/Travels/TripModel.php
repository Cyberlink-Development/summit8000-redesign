<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;
use App\Models\SeoMeta;

class TripModel extends Model
{
    protected $table = 'cl_trip_details';
    protected $fillable = ['trip_title', 'sub_title', 'duration', 'max_altitude', 'best_season',
        'walking_per_day', 'group_size', 'accommodation', 'route','trip_highlight','peak_name',
        'trip_type','starting_price','trip_map','trip_video','trip_chart','trip_excerpt',
        'trip_content', 'trip_grade','status_text','uri','ordering','trip_code','meta_key',
         'meta_description', 'banner','thumbnail','trip_pdf','visiter','video_status',  'start_date','price','discount','trip_of_the_month','meals','tripmap_alt','thumbnail_alt','banner_alt'];

    /* The destinations that belongs to the trip */
    public function destinations()
    {
        return $this->belongsToMany('App\Models\Destinations\DestinationModel', 'cl_trip_destination_rel', 'trip_id', 'destination_id');
    }

    // Related Trips
    public function relatedtrips()
    {
        return $this->belongsToMany('App\Models\Travels\TripModel', 'cl_related_trip_rel', 'trip_id', 'related_trip_id');
    }

    /* The regions that belongs to the trip */
    public function regions()
    {
        return $this->belongsToMany('App\Models\Travels\RegionModel', 'cl_trip_region_rel', 'trip_id', 'region_id');
    }

    /* The activities that belongs to the trip */
    public function activities()
    {
        return $this->belongsToMany('App\Models\Travels\ActivityModel', 'cl_trip_activity_rel', 'trip_id', 'activity_id');
    }

    /* The trip groups that belongs to the trip */
    public function tripgroups()
    {
        return $this->belongsToMany('App\Models\Travels\TripGroupModel', 'cl_trip_group_rel', 'trip_id', 'group_id');
    }

    public function gears()
    {
        return $this->hasMany('App\Models\Travels\TripGearModel', 'trip_detail_id');
    }
    public function banners(){
        return $this->hasMany('App\Models\Travels\TripBanner', 'trip_detail_id');
    }
    public function costincludes()
    {
        return $this->hasMany('App\Models\Cost\CostIncludesModel', 'trip_detail_id');
    }

    public function costexcludes()
    {
        return $this->hasMany('App\Models\Cost\CostExcludesModel', 'trip_detail_id');
    }

     public function itineraries()
     {
        return $this->hasMany('App\Models\Travels\TripItineraryModel','trip_detail_id');
    }

     public function schedules()
    {
        return $this->hasMany('App\Models\Travels\TripScheduleModel', 'trip_detail_id')->orderby('ordering','asc');
    }

        public function faqs()
    {
        return $this->hasMany('App\Models\Faqs\FaqModel', 'trip_detail_id');
    }
    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }


}
