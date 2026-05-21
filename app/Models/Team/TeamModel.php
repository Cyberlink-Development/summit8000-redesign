<?php

namespace App\Models\Team;

use App\Models\SeoMeta;
use Illuminate\Database\Eloquent\Model;
use App\Models\PageSlug;

class TeamModel extends Model
{
    protected $table = 'cl_team';
    protected $fillable = [
        'name',
        'position',
        'category',
        'fb_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'phone',
        'email',
        'content',
        'brief',
        'status',
        'ordering',
        'banner',
        'thumbnail',
        'uri',
        'team_key',
        'show_in_home',
        'experience',
        'languages',
        'certifications',
        'specialisation'
    ];

    /* The certificates that belongs to the team */
    public function certificates()
    {
        return $this->hasMany('App\Models\Team\Certificates', 'team_id');

    }

    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
    public function slugs()
    {
        return $this->morphMany(PageSlug::class, 'sluggable');
    }

}
