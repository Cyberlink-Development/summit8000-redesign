<?php

namespace App\Models\Cost;

use Illuminate\Database\Eloquent\Model;

class CostExcludesModel extends Model
{
    protected $table = 'cl_cost_excludes';
    protected $fillable = ['trip_id','category', 'title', 'content', 'ordering'];

}
