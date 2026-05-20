<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;
use App\Models\SeoMeta;
use App\Models\PageSlug;

class PostModel extends Model
{
    protected $table = 'cl_posts';
    protected $fillable = [
        'post_date', 'post_author', 'template', 'template', 'post_title', 'sub_title', 'post_content','reading_time',
        'post_excerpt', 'uri', 'page_key', 'post_type', 'post_parent', 'post_order', 'page_banner',
        'page_thumbnail', 'page_video', 'meta_keyword', 'meta_description', 'associated_title','author', 'external_link','about_type',
        'post_tags', 'status', 'published', 'is_active', 'is_draft', 'is_trashed', 'show_in_home', 'is_password_protected','is_commentable', 'lang',
    ];

    public function associated_posts()
    {
      return $this->hasMany('App\Models\Posts\AssociatedPostModel','post_id');
    }
    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }

    public function category()
    {
        return $this->belongsTo(PostCategoryModel::class, 'post_category', 'id');
    }
    public function images()
    {
        return $this->hasMany('App\Models\Posts\PostImageModel', 'post_id');
    }

    public function slugs()
    {
        return $this->morphMany(PageSlug::class, 'sluggable');
    }

}
