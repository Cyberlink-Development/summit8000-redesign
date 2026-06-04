<?php

namespace App\Models\Posts;

use App\Traits\HasSitemapUrl;
use Illuminate\Database\Eloquent\Model;
use App\Models\PageSlug;

class PostCategoryModel extends Model
{
    use HasSitemapUrl;

    protected $table = 'cl_post_categories';
    protected $fillable = [
    	'post_type','category','category_caption','category_content','uri','ordering','thumbnail'
    ];

    public function posts()
    {
        return $this->hasMany(PostModel::class, 'post_category', 'id');
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
