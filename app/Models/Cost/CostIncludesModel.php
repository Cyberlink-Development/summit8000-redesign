<?php

namespace App\Models\Cost;

use Illuminate\Database\Eloquent\Model;

class CostIncludesModel extends Model
{
    protected $table = 'cl_cost_includes';
    protected $fillable = ['trip_id','category','title','content','ordering','status'];
}
