<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;
use App\Models\SeoMeta;
use App\Models\PageSlug;

class AssociatedPostModel extends Model
{
    protected $table = 'cl_associated_posts';
    protected $fillable = ['post_id', 'title', 'brief', 'content', 'thumbnail', 'ordering', 'uri', 'page_key','show_in_home'];
    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
    public function slugs()
    {
        return $this->morphMany(PageSlug::class, 'sluggable');
    }
}
