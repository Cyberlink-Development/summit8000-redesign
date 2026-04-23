<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class SeoMeta extends Model
{
    use HasFactory;
    protected $table = 'seo_meta';

    protected $fillable = [
        'uuid',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
        'og_image_alt',
        'canonical_url',
        'robots',
        'schema_type',
        'schema_data',
        'focus_keyword',
        'in_sitemap',
        'sitemap_priority',
        'change_frequency',
    ];
    protected $casts = [
        'schema_data' => 'array',
        'in_sitemap' => 'boolean',
        'sitemap_priority' => 'float',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function seoable()
    {
        return $this->morphTo();
    }
    public function getOgTitleAttribute($value)
    {
        return $value ?: $this->meta_title;
    }

    public function getOgDescriptionAttribute($value)
    {
        return $value ?: $this->meta_description;
    }
}
