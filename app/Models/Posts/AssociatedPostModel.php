<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class AssociatedPostModel extends Model
{
    protected $table = 'cl_associated_posts';
    protected $fillable = ['post_id', 'title', 'brief', 'content', 'thumbnail', 'ordering', 'uri', 'page_key','show_in_home'];
}
