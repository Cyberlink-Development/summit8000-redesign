<?php

namespace App\Models\Travels;

use App\Traits\HasSitemapUrl;
use Illuminate\Database\Eloquent\Model;
use App\Models\PageSlug;

class TripGroupModel extends Model
{
    use HasSitemapUrl;

    protected $table = 'cl_trip_groups';
    protected $fillable = ['title','sub_title','uri','thumbnail','banner','excerpt','content','meta_keyword','meta_description','ordering','status'];

    public function trips(){
    	return $this->belongsToMany('App\Models\Travels\TripModel','cl_trip_group_rel','group_id','trip_id');
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
