<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostImageModel extends Model
{
    protected $table = 'cl_multiple_image';
    protected $fillable = ['post_id','file_name','title'];
}
