<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostImageModel extends Model
{
    protected $table = 'cl_multiple_image';
    protected $fillable = ['post_id','file_name','title'];

    public function post()
    {
        return $this->belongsTo('App\Models\Posts\PostModel', 'post_id');
    }
}
