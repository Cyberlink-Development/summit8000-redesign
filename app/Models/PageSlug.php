<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSlug extends Model
{
    use HasFactory;
    protected $table = 'page_slugs';

    protected $fillable = [
        'slug'
    ];

    public function sluggable()
    {
        return $this->morphTo();
    }
}
