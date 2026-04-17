<?php

namespace App\Models\Faqs;

use Illuminate\Database\Eloquent\Model;

class FaqModel extends Model
{
    protected $table = 'cl_trip_faqs';
    protected $fillable = ['trip_detail_id', 'title', 'content', 'ordering', 'status'];
}
