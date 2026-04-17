<?php

namespace App\Models\Banners;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $table = 'cl_banner';
    protected $fillable = ['title','caption','link','youtube_link','picture','status','video','picture_alt'];
}
