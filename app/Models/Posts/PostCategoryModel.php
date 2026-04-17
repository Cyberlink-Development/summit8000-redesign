<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostCategoryModel extends Model
{
    protected $table = 'cl_post_categories';
    protected $fillable = [
    	'post_type','category','category_caption','category_content','uri','ordering','thumbnail'
    ];
}
