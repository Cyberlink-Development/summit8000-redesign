<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostTypeModel extends Model
{
    protected $table = 'cl_post_type';
    protected $fillable = ['post_type','uri','template','ordering','is_menu','content','banner','associated_title', 'meta_keyword', 'meta_description'];

    
    public function posts()
    {
      return $this->hasMany('App\Models\Posts\PostModel','post_type')->where('post_parent','0');
    }
}
